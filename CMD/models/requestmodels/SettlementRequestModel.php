<?php
namespace CMD\Trendyol\models\requestmodels;



class SettlementRequestModel
{
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
     * transactionType
     *
     * @var string | duruma göre SettleMentTransactionType yada OtherTransactionalType ile
     * set edilebilir
     */
    public $transactionType;

    public function rules()
    {
        return [
            [['startDate','endDate','page','size'], 'number', 'message' => 'yanlis tarih formati | time türünde gönderilmelidir'],
            ['transactionType','required']
        ];
    }
}
