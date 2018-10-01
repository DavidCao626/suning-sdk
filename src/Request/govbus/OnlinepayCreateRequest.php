<?php

namespace DavidCao626\SuningSdk\Request\Govbus;

use DavidCao626\SuningSdk\Util\RequestCheckUtil;
use DavidCao626\SuningSdk\SuningRequest;

/**
 * 苏宁开放平台接口 -.
 *
 * @author suning
 * @date   2017-12-19
 */
class OnlinepayCreateRequest extends SuningRequest
{
    private $orderId;

    private $channelType;

    private $backUrl;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        $this->apiParams['orderId'] = $orderId;
    }

    public function getChannelType()
    {
        return $this->channelType;
    }

    public function setChannelType($channelType)
    {
        $this->channelType = $channelType;
        $this->apiParams['channelType'] = $channelType;
    }

    public function getBackUrl()
    {
        return $this->backUrl;
    }

    public function setBackUrl($backUrl)
    {
        $this->backUrl = $backUrl;
        $this->apiParams['backUrl'] = $backUrl;
    }

    public function getApiMethodName()
    {
        return 'suning.govbus.onlinepay.create';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //非空校验
        RequestCheckUtil::checkNotNull($this->orderId, 'orderId');
        RequestCheckUtil::checkNotNull($this->channelType, 'channelType');
        RequestCheckUtil::checkNotNull($this->backUrl, 'backUrl');
    }

    public function getBizName()
    {
        return 'createOnlinepay';
    }
}
