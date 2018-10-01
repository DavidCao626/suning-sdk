<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:39
 */

namespace DavidCao626\SuningSdk\Request\Govbus;


class SkuIds {

    private $apiParams = array();

    private $skuId;
    private $num;
    private $piece;

    public function getNum() {
        return $this->num;
    }

    public function setNum($num) {
        $this->num = $num;
        $this->apiParams["num"] = $num;
    }

    public function getSkuId() {
        return $this->skuId;
    }

    public function setSkuId($skuId) {
        $this->skuId = $skuId;
        $this->apiParams["skuId"] = $skuId;
    }

    public function getPiece() {
        return $this->piece;
    }

    public function setPiece($piece) {
        $this->piece = $piece;
        $this->apiParams["piece"] = $piece;
    }

    public function getApiParams(){
        return $this->apiParams;
    }

}
