<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:37
 */

namespace DavidCao626\SuningSdk\Request\Govbus;


class OrderInfoDTO {

    private $apiParams = array();

    private $gcOrderNo;

    public function getGcOrderNo() {
        return $this->gcOrderNo;
    }

    public function setGcOrderNo($gcOrderNo) {
        $this->gcOrderNo = $gcOrderNo;
        $this->apiParams["gcOrderNo"] = $gcOrderNo;
    }

    public function getApiParams(){
        return $this->apiParams;
    }

}