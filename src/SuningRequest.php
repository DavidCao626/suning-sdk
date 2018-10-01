<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 14:48.
 */

namespace DavidCao626\SuningSdk;

abstract class SuningRequest
{
    protected $apiParams = array();

    /**
     * 是否参数校验(默认false,测试及生产建议为true).
     */
    protected $checkParam = false;

    public function getCheckParam()
    {
        return $this->checkParam;
    }

    public function setCheckParam(bool $checkParam)
    {
        $this->checkParam = $checkParam;
    }

    public function generatorJsonReq($appParams)
    {
        return null;
    }

    public function generatorXmlReq($appParams)
    {
        return null;
    }

    /**
     * 根据请求方式，生成相应请求报文.
     *
     * @param
     *            type 请求方式(json或xml)
     */
    abstract public function getApiParams();

    /**
     * 获取接口方法名称.
     */
    abstract public function getApiMethodName();

    /**
     * 数据校验.
     */
    abstract public function check();

    abstract public function getBizName();

    /**
     * 获取请求报文.
     */
    public function getReqJson()
    {
        $paramsArray = $this->getApiParams();
        if (empty($paramsArray)) {
            $paramsArray = '';
        }
        $paramsArray = array('sn_request' => array('sn_body' => array(
                    $this->getBizName() => $paramsArray,
                ),
            ),
        );

        return json_encode($paramsArray);
    }
}
