<?php

declare(strict_types=1);

namespace DavidCao626\SuningSdk\Request\Govbus;

use DavidCao626\SuningSdk\SuningRequest;

class CategoryGetRequest extends SuningRequest
{
    public function getApiMethodName()
    {
        return 'suning.govbus.category.get';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //todo:非空校验
    }

    public function getBizName()
    {
        return 'getCategory';
    }
}
