<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:38.
 */

namespace DavidCao626\SuningSdk\Request\Govbus;

class OrderIds
{
    private $apiParams = array();

    private $orderId;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        $this->apiParams['orderId'] = $orderId;
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }
}
