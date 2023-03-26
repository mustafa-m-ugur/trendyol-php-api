<?php
namespace CMD\Trendyol\models\basemodels;

class OrderLine
{
    /**
     * orderLineId
     *
     * @var int
     */
    public $orderLineId;
    /**
     * quantity
     *
     * @var int
     */
    public $quantities;

     /**
      * __construct
      *
      * @param  int $orderLineId
      * @param  int $quantities
      * @return void
      */
     public function __construct($orderLineId, $quantities)
    {

        $this->orderLineId = $orderLineId;
        $this->quantities = $quantities;
    }
}
