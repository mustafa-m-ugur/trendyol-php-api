<?php
namespace CMD\Trendyol\models\requestmodels;


class OrderSplitRequestModel
{
    /**
     * splitPackages
     *
     * @var array of SplitOrderD
     */
    public  $splitPackages;
}

class SplitOrderDetails
{
    /**
     * packageDetails
     *
     * @var array of OrderLine
     */
    public $packageDetails;
    /**
     * __construct
     *
     * @param  array $listOfPackagesDetails array of SplitOrderD
     * @return void
     */
    public function __construct($listOfPackagesDetails)
    {
        $this->packageDetails =$listOfPackagesDetails;
    }
}
