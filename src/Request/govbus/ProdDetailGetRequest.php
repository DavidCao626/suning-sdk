<?php
namespace DavidCao626\SuningSdk\Request\Govbus;

use DavidCao626\SuningSdk\Util\RequestCheckUtil;
use DavidCao626\SuningSdk\SuningRequest;

/**
 * 苏宁开放平台接口 - 
 *
 * @author suning
 * @date   2018-3-6
 */
class ProdDetailGetRequest  extends SuningRequest{
	
	/**
	 * 
	 */
	private $skuId;
	
	public function getSkuId() {
		return $this->skuId;
	}
	
	public function setSkuId($skuId) {
		$this->skuId = $skuId;
		$this->apiParams["skuId"] = $skuId;
	}
	
	public function getApiMethodName(){
		return 'suning.govbus.proddetail.get';
	}
	
	public function getApiParams(){
		return $this->apiParams;
	}
	
	public function check(){
		//非空校验
		RequestCheckUtil::checkNotNull($this->skuId, 'skuId');
	}
	
	public function getBizName(){
		return "getProdDetail";
	}
	
}

?>