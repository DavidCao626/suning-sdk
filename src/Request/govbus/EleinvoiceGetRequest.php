<?php

namespace DavidCao626\SuningSdk\Request\Govbus;

use DavidCao626\SuningSdk\Util\RequestCheckUtil;
use DavidCao626\SuningSdk\SuningRequest;

/**
 * 苏宁开放平台接口 -.
 *
 * @author suning
 * @date   2017-10-17
 */
class EleinvoiceGetRequest extends SuningRequest
{
    private $orderId;

    private $orderItems;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        $this->apiParams['orderId'] = $orderId;
    }

    public function getOrderItems()
    {
        return $this->orderItems;
    }

    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
        $arr = array();
        foreach ($orderItems as $temp) {
            array_push($arr, $temp->getApiParams());
        }
        $this->apiParams['orderItems'] = $arr;
    }

    public function getApiMethodName()
    {
        return 'suning.govbus.eleinvoice.get';
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
        return 'getEleinvoice';
    }
}
