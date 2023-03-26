<?php
namespace CMD\Trendyol\models\basemodels;
class TrendyolBaseResponseModel
{
    /**
     * status
     *
     * @var bool requesting başarılı olup olmadığı bilgisi
     */
    public $status;
    /**
     * statusCode
     *
     * @var int htto response status code
     */
    public $statusCode;
    /**
     * errorCode
     *
     * @var string servisten http haricinde dönen spesifik
     * bir hata kodu varsa bu alana set edilecektir
     */
    public $errorCode;
    /**
     * errorMessage
     *
     * @var string hata mesajı
     */
    public $errorMessage;
    /**
     * response
     *
     * @var object success durumda dönen response body
     */
    /**
     * request
     *
     * @var string
     */
    public $request;
    public $response;
    public $client;
}
