<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:36.
 */

namespace DavidCao626\SuningSdk\Request\Govbus;

class SkuConfirmList
{
    private $apiParams = array();

    private $confirmTime;

    private $skuId;

    public function getConfirmTime()
    {
        return $this->confirmTime;
    }

    public function setConfirmTime($confirmTime)
    {
        $this->confirmTime = $confirmTime;
        $this->apiParams['confirmTime'] = $confirmTime;
    }

    public function getSkuId()
    {
        return $this->skuId;
    }

    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;
        $this->apiParams['skuId'] = $skuId;
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }
}
