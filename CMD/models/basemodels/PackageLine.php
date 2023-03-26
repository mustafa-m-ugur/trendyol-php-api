<?php
namespace CMD\Trendyol\models\basemodels;

class PackageLine
{
    /**
     * lineId
     *
     * @var int
     */
    public $lineId;
    /**
     * quantity
     *
     * @var int
     */
    public $quantity;

     /**
      * __construct
      *
      * @param  int $lineId
      * @param  int $quantity
      * @return void
      */
     public function __construct($lineId, $quantity)
    {

        $this->lineId = $lineId;
        $this->quantity = $quantity;
    }
}
