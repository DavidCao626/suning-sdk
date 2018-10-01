<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:39.
 */

namespace DavidCao626\SuningSdk\Request\Govbus;

class Sku
{
    private $apiParams = array();

    private $num;

    private $skuId;

    private $unitPrice;

    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;
        $this->apiParams['num'] = $num;
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

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        $this->apiParams['unitPrice'] = $unitPrice;
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }
}
