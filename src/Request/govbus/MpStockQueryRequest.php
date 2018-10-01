<?php

namespace DavidCao626\SuningSdk\Request\Govbus;

use DavidCao626\SuningSdk\Util\RequestCheckUtil;
use DavidCao626\SuningSdk\SuningRequest;

/**
 * 苏宁开放平台接口 -.
 *
 * @author suning
 * @date   2016-11-17
 */
class MpStockQueryRequest extends SuningRequest
{
    private $cityId;

    private $skuIds;

    public function getCityId()
    {
        return $this->cityId;
    }

    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
        $this->apiParams['cityId'] = $cityId;
    }

    public function getSkuIds()
    {
        return $this->skuIds;
    }

    public function setSkuIds($skuIds)
    {
        $this->skuIds = $skuIds;
        $arr = array();
        foreach ($skuIds as $temp) {
            array_push($arr, $temp->getApiParams());
        }
        $this->apiParams['skuIds'] = $arr;
    }

    public function getApiMethodName()
    {
        return 'suning.govbus.mprodstock.query';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //非空校验
        RequestCheckUtil::checkNotNull($this->cityId, 'cityId');
    }

    public function getBizName()
    {
        return 'queryMpStock';
    }
}
