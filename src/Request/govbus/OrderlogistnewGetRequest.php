<?php

namespace DavidCao626\SuningSdk\Request\Govbus;

use DavidCao626\SuningSdk\Util\RequestCheckUtil;
use DavidCao626\SuningSdk\SuningRequest;

/**
 * 苏宁开放平台接口 -.
 *
 * @author suning
 * @date   2018-2-7
 */
class OrderlogistnewGetRequest extends SuningRequest
{
    private $orderId;

    private $orderItemIds;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        $this->apiParams['orderId'] = $orderId;
    }

    public function getOrderItemIds()
    {
        return $this->orderItemIds;
    }

    public function setOrderItemIds($orderItemIds)
    {
        $this->orderItemIds = $orderItemIds;
        $arr = array();
        foreach ($orderItemIds as $temp) {
            array_push($arr, $temp->getApiParams());
        }
        $this->apiParams['orderItemIds'] = $arr;
    }

    public function getApiMethodName()
    {
        return 'suning.govbus.orderlogistnew.get';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //非空校验
        RequestCheckUtil::checkNotNull($this->orderId, 'orderId');
    }

    public function getBizName()
    {
        return 'getOrderlogistnew';
    }
}
