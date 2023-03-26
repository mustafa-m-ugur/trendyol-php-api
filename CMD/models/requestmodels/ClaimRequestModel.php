<?php
namespace CMD\Trendyol\models\requestmodels;

class ClaimRequestModel
{
    /**
     * claimsIds
     *
     * @var string
     */
    public $claimsIds;
    /**
     * claimStatus
     *
     * @var string models\basemodels\ClaimStatus
     * türünden enum ile set edilebilecek durum parametresi
     */
    public $claimStatus;
    /**
     * startDate
     *
     * @var int time türünden balangıç tarihi
     */
    public $startDate;
    /**
     * endDate
     *
     * @var int time türünde bitiş tarihi
     */
    public $endDate;
    /**
     * page
     *
     * @var int belirtilen sayfadaki kayıtları getir
     */
    public $page;
    /**
     * size
     *
     * @var int sayfa başı kayıt adedi
     */
    public $size;
    /**
     * orderNumber
     *
     * @var string belirli bir sipariş'in kaydını getirmek için kullanılır
     */
    public $orderNumber;
}
