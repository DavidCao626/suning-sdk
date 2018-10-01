<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/1
 * Time: 11:12.
 */

namespace DavidCao626\SuningSdk\Test;

use DavidCao626\SuningSdk\Request\Govbus\CategoryGetRequest;
use DavidCao626\SuningSdk\DefaultSuningClient;
use PHPUnit\Framework\TestCase;

class SuningSdkTest extends TestCase
{
    public function testDefaultSuningClientExecute()
    {
        $req = new CategoryGetRequest();
        $req->setCheckParam('true');
        $assertArray = [
            'serverUrl' => 'http://openpre.cnsuning.com/api/http/sopRequest',
            'appKey' => 'b49970b52c88dee1d7c1743da32cedd2',
            'appSecret' => '2ae2da81c64ae149c2aeb99a535508b0',
            'format' => 'json',
        ];
        $client = new DefaultSuningClient($assertArray['serverUrl'], $assertArray['appKey'],
            $assertArray['appSecret'], $assertArray['format']);

        $resp = $client->execute($req);
        $reqJson = $req->getReqJson();
        print_r("请求报文:\n".$reqJson);
        print_r("\n返回响应报文:\n".$resp);
        $this->assertNotNull($resp);
    }

    public function testInitDefaultSuningClient()
    {
        $assertArray = [
            'serverUrl' => 'http://openpre.cnsuning.com/api/http/sopRequest',
            'appKey' => 'b49970b52c88dee1d7c1743da32cedd2',
            'appSecret' => '2ae2da81c64ae149c2aeb99a535508b0',
            'format' => 'json',
        ];
        $client = new DefaultSuningClient($assertArray['serverUrl'], $assertArray['appKey'],
            $assertArray['appSecret'], $assertArray['format']);

        $assertArrayForDefaultSuningClient = [
            'serverUrl' => $client->getServerUrl(),
            'appKey' => $client->getAppKey(),
            'appSecret' => $client->getAppSecret(),
            'format' => $client->getFormat(),
        ];
        //断言构造赋值方式
        $this->assertEquals(0, count(array_diff($assertArray, $assertArrayForDefaultSuningClient)));
    }

    public function testCategoryGetRequestSetAndGetCheckParam()
    {
        $req = new CategoryGetRequest();
        $req->setCheckParam('true');
        $this->assertTrue($req->getCheckParam());
    }
}
