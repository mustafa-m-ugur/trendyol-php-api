<?php
namespace CMD\Trendyol\models\basemodels;
class PackageParams
{
    /**
     * invoiceNumber
     *
     * @var string
     */
    public $invoiceNumber;

    /**
     * __construct
     *
     * @param  string $invoiceNumber
     * @return void
     */
    public function __construct($invoiceNumber)
    {

        $this->invoiceNumber = $invoiceNumber;
    }
}
