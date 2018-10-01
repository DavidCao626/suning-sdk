<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 13:31.
 */

declare(strict_types=1);

namespace DavidCao626\SuningSdk;

use DavidCao626\SuningSdk\Exceptions\HttpException;
use DavidCao626\SuningSdk\Exceptions\InvalidArgumentException;
use DavidCao626\SuningSdk\Util\ArrayToXML;

class DefaultSuningClient
{
    /**
     * 应用访问key.
     */
    private $appKey;

    /**
     * 应用访问密钥.
     */
    private $appSecret;

    /**
     * 服务器访问地址
     */
    private $serverUrl;

    /**
     * 请求、响应格式.
     */
    private $format;

    private static $apiVersion = 'v1.2';

    private static $checkRequest = true;

    private static $signMethod = 'md5';

    private static $connectTimeout = 5;

    private static $readTimeout = 30;

    private static $userAgent = 'suning-sdk-php';

    private static $sdkVersion = 'suning-sdk-php-beta0.1';

    private static $accessToken = '';

    /**
     * 构造方法.
     *
     * @param string $serverUrl 服务调用地址
     * @param string $appKey    应用访问key
     * @param string $appSecret appKey对应密钥
     * @param string $format    请求、响应格式(xml、json)
     */
    public function __construct(string $serverUrl = null, string $appKey = null, string $appSecret = null, string $format = null)
    {
        // exit($serverUrl);
        $this->serverUrl = $serverUrl;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->format = $format;
    }

    /**
     * 封装头信息及签名.
     *
     * $param array $params
     *
     * @return array
     */
    private function generateSignHeader($params)
    {
        $signString = '';
        foreach ($params as $k => $v) {
            $signString .= $v;
        }
        unset($k, $v);
        $signMethod = self::$signMethod;
        $signString = $signMethod($signString);

        // 组装头文件信息
        $signDataHeader = array(
            'Content-Type: text/xml; charset=utf-8',
            'AppMethod: '.$params['method'],
            'AppRequestTime: '.$params['date'],
            'Format: '.$this->format,
            'signInfo: '.$signString,
            'AppKey: '.$params['app_key'],
            'VersionNo: '.$params['api_version'],
            'User-Agent: '.self::$userAgent,
            'Sdk-Version: '.self::$sdkVersion,
        );

        if (!empty(self::$accessToken)) {
            $signDataHeader[] = 'access_token:'.self::$accessToken;
        }

        return $signDataHeader;
    }

    /**
     * 准备发送的参数及检查验证
     *
     * @param mixed $request
     *
     * @return string
     */
    public function execute($request)
    {
        if (\is_null($this->serverUrl)) {
            throw new InvalidArgumentException('Invalid serverUrl');
        }

        if (\is_null($this->appKey)) {
            throw new InvalidArgumentException('Invalid appKey');
        }
        if (\is_null($this->appSecret)) {
            throw new InvalidArgumentException('Invalid appSecret');
        }
        if (\is_null($this->format)) {
            throw new InvalidArgumentException('Invalid format');
        }
        if (!\in_array(\strtolower($this->format), ['xml', 'json'])) {
            throw new InvalidArgumentException('Invalid format value(xml/json) ');
        }

        $checkParam = $request->getCheckParam();
        if ($checkParam) {
            try {
                $request->check();
            } catch (\Exception $e) {
                throw new InvalidArgumentException('Invalid format:'.$checkParam);
            }
        }

        // 获取业务参数
        $paramsArray = $request->getApiParams();
        if (empty($paramsArray)) {
            $paramsArray = '';
        }
        $paramsArray = array('sn_request' => array('sn_body' => array(
            "{$request->getBizName()}" => $paramsArray,
        )));
        if ('json' == $this->format) {
            $apiParams = json_encode($paramsArray);
        } else {
            $apiParams = ArrayToXML::parse($paramsArray['sn_request'],
                'sn_request');
        }

        // 组装系统参数
        $sysParams['secret_key'] = $this->appSecret;
        $sysParams['method'] = $request->getApiMethodName();
        $sysParams['date'] = date('Y-m-d H:i:s');
        $sysParams['app_key'] = $this->appKey;
        $sysParams['api_version'] = self::$apiVersion;
        $sysParams['post_field'] = base64_encode($apiParams);

        // 头信息(内含签名)
        $signHeader = self::generateSignHeader($sysParams);
        unset($sysParams);
        // 发起HTTP请求
        try {
            $resp = self::curl($this->serverUrl.'/'.$request->getApiMethodName(), $apiParams, $signHeader);
        } catch (\Exception  $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return $resp;
    }

    /**
     * 发送请求
     *
     * @param string   $url
     * @param json|xml $postFields
     *                             $param array $header
     *
     * @return json xml
     */
    public static function curl($url, $postFields = null, $header = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$readTimeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        // https 请求
        if (strlen($url) > 5 && 'https' == strtolower(substr($url, 0, 5))) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new HttpException(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new HttpException('Suning API Network Error！httpStatusCode'.$response, $httpStatusCode);
            }
        }
        curl_close($ch);

        return $response;
    }

    /**
     * OAuth授权必须设置.
     *
     * @param mixed $accessToken
     *                           $return void
     */
    public static function setAccessToken($accessToken)
    {
        self::$accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return string
     */
    public function getServerUrl()
    {
        return $this->serverUrl;
    }
}
