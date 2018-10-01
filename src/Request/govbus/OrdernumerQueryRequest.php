<?php
namespace DavidCao626\SuningSdk\Request\Govbus;

use DavidCao626\SuningSdk\SuningRequest;

/**
 * 苏宁开放平台接口 - 
 *
 * @author suning
 * @date   2017-12-19
 */
class OrdernumerQueryRequest  extends SuningRequest{
	
	/**
	 * 
	 */
	private $orderIds;
	
	public function getOrderIds() {
		return $this->orderIds;
	}
	
	public function setOrderIds($orderIds) {
		$this->orderIds = $orderIds;
		$arr = array();
		foreach ($orderIds as $temp){
			array_push($arr,$temp->getApiParams());
		}
		$this->apiParams["orderIds"] = $arr;
	}
	
	public function getApiMethodName(){
		return 'suning.govbus.ordernumber.query';
	}
	
	public function getApiParams(){
		return $this->apiParams;
	}
	
	public function check(){
		//非空校验
	}
	
	public function getBizName(){
		return "queryOrdernumer";
	}
	
}

