<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:36.
 */

namespace DavidCao626\SuningSdk\Request\Govbus;

class OrderItems
{
    private $apiParams = array();

    private $orderItemId;

    private $skuId;

    public function getOrderItemId()
    {
        return $this->orderItemId;
    }

    public function setOrderItemId($orderItemId)
    {
        $this->orderItemId = $orderItemId;
        $this->apiParams['orderItemId'] = $orderItemId;
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
