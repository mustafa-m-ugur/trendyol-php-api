<?php

namespace CMD\Trendyol\service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Message;
use CMD\Trendyol\config\Endpoints;
use CMD\Trendyol\config\Credentials;
use GuzzleHttp\Exception\RequestException;

use CMD\Trendyol\models\basemodels\TrendyolBaseResponseModel;
use CMD\Trendyol\models\requests\invoices\TrendyolRequestException;

class TrendyolBaseService
{
    /**
     * @param $isTestStage bool client object is test instance or prod instance
     * @param $endpoint string
     *
     * @var $client GuzzleHttp\Client
     * @var $request  GuzzleHttp\Psr7\Request
     */
    protected $client;
    protected $isTestStage;
    protected $credentials;

    public function __construct($isTestStage, Credentials $credentials)
    {
        $this->credentials = $credentials;
        $this->isTestStage = $isTestStage;
        $base_url = $isTestStage ? Endpoints::test_base_url : Endpoints::prod_base_url;
        $header = $this->getHeader($base_url);
        $this->client = new Client($header);

    }


    /**
     * generating url with supplier id
     * @return string
     */
    public function getUrl($endpoint)
    {
        return Endpoints::suppliers . "/" . $this->credentials->supplierId . "/" . $endpoint;
    }

    /**
     * generating url without supplier id
     * @return string
     */
    public function getUrlWithoutSuppliers($endpoint)
    {
        return $endpoint;
    }

    public function geFinancetUrl($endpoint)
    {
        return Endpoints::financeSubDomain . "/" . $this->credentials->supplierId . "/" . $endpoint;
    }

    protected function getHeader($base_url)
    {
        return [
            'base_uri' => $base_url,
            'headers' => [
                "Authorization" => 'Basic ' . base64_encode($this->credentials->username . ":" . $this->credentials->password),
                "User-Agent" => $this->credentials->username . " - " . "SelfIntegration",
                "Content-Type" => "application/json",
                "Accept" => "application/json"
            ]
        ];
    }

    public function request($method, $uri = '', array $options = [])
    {
        $baseresponse = new TrendyolBaseResponseModel();
        $_response = null;
        try {
            $_response = $this->client->request($method, $uri, $options);
            $baseresponse->status = true;
            $baseresponse->statusCode = $_response->getStatusCode();
            $baseresponse->response = \json_decode($_response->getBody()->getContents());
        } catch (RequestException $e) {
            $baseresponse->status = false;
            $baseresponse->statusCode = $e->getCode();
            $baseresponse->errorMessage = $e->getMessage();
            if ($e->hasResponse()) {
                $baseresponse->response = $e->getResponse()->getBody();
            }

        } finally {
            ///GuzzleHttp\Client
            $baseresponse->client = $this->client;
        }
        return $baseresponse;
    }

}
