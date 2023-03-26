<?php
namespace CMD\Trendyol\models\requestmodels;

class ClaimCreateRequestModel extends
{
    /**
     * claimItems
     *
     * @var array( ClaimItems )
     */
    public $claimItems;
    /**
     * customerId
     *
     * @var int
     */
    public $customerId;
    /**
     * excludeListing
     *
     * @var boolean
     */
    public $excludeListing; //boolean
    /**
     * forcePackageCreation
     *
     * @var boolean
     */
    public $forcePackageCreation; //boolean
    /**
     * orderNumber
     *
     * @var string
     */
    public $orderNumber; //String
    /**
     * shipmentCompanyId
     *
     * @var int
     */
    public $shipmentCompanyId; //int
}

class ClaimItems extends Model {
    /**
     * barcode
     *
     * @var string
     */
    public $barcode; //String
    /**
     * customerNote
     *
     * @var string
     */
    public $customerNote; //String
    /**
     * quantity
     *
     * @var int
     */
    public $quantity; //int
    /**
     * reasonId
     *
     * @var int
     */
    public $reasonId; //int


    /**
     * __construct
     *
     * @param  string $customerNote
     * @param  string $barcode
     * @param  int $quantity
     * @param  int $reasonId
     * @return void
     */


   }
