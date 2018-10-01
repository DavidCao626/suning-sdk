<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 19:37
 */

namespace DavidCao626\SuningSdk\Request\Govbus;


class SubPaymentModes {

    private $apiParams = array();

    private $payAmount;

    private $payCode;

    public function getPayAmount() {
        return $this->payAmount;
    }

    public function setPayAmount($payAmount) {
        $this->payAmount = $payAmount;
        $this->apiParams["payAmount"] = $payAmount;
    }

    public function getPayCode() {
        return $this->payCode;
    }

    public function setPayCode($payCode) {
        $this->payCode = $payCode;
        $this->apiParams["payCode"] = $payCode;
    }

    public function getApiParams(){
        return $this->apiParams;
    }

}
