<?php
namespace CMD\Trendyol\models\requestmodels;

class StockAndPriceUpdateRequestModel
{
    /**
     * @var $barcode string
     */
    public $barcode;
    /**
     * quantity
     *
     * @var integer
     */
    public $quantity;
    /**
     * salePrice
     *
     * @var double
     */
    public $salePrice;
    /**
     * listPrice
     *
     * @var double
     */
    public $listPrice;
    /**
     * __construct
     *
     * @param  string $barcode
     * @param  double $quantity
     * @param  double $salePrice
     * @param  double $listPrice
     * @return void
     */
    public function __construct($barcode,$quantity,$salePrice,$listPrice)
    {
        $this->barcode=$barcode;
        $this->quantity=$quantity;
        $this->salePrice=$salePrice;
        $this->listPrice=$listPrice;
    }
}
