<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:39.
 */

namespace DavidCao626\SuningSdk\Request\Govbus;

class Skus
{
    private $apiParams = array();

    private $num;

    private $price;

    private $skuId;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        $this->apiParams['price'] = $price;
    }

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

    public function getApiParams()
    {
        return $this->apiParams;
    }
}
