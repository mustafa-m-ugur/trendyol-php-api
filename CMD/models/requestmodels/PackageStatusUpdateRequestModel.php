<?php
namespace CMD\Trendyol\models\requestmodels;

use CMD\Trendyol\models\basemodels\OrderStatus;
use CMD\Trendyol\models\basemodels\PackageParams;

class PackageStatusUpdateRequestModel
{
    /**
     * lines
     *
     * @var array of LinePackage
     */
    public $lines;
    /**
     * params
     *
     * @var array
     */
    public PackageParams $params;
    /**
     * status
     *
     * @var OrderStatus
     */
    public $status;
}
