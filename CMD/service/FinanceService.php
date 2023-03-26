<?php
namespace CMD\Trendyol\service;


use GuzzleHttp\Client;
use CMD\Trendyol\config\Endpoints;
use GuzzleHttp\Exception\RequestException;
use CMD\Trendyol\models\basemodels\TrendyolBaseResponseModel;
use CMD\Trendyol\models\requestmodels\SettlementRequestModel;

class FinanceService extends TrendyolBaseService
{
    /**
     * getSettleMents
     *
     * @param  SettlementRequestModel $settlementReques
     * @return TrendyolBaseResponseModel
     */
    public function getSettleMents(SettlementRequestModel $settlementReques)
    {

            $querystringParameters=[];
            foreach ($settlementReques as $key => $value)
            {
                if($value!=null)
                {
                    $querystringParameters[$key]=$value;
                }
            }
            $queryString =  http_build_query($querystringParameters);
            $endpoint  = $this->geFinancetUrl(Endpoints::settlements);
            //client nesnesini finans endpoin'ine uygun şekilde
            //değişitirip öyle request atıyoruz
            $this->initializeFinanceClient();
            return $this->request("GET",$endpoint."?".$queryString);

    }

    /**
     * finaceRequest
     *
     * @param  string $method GET|POST|PUT
     * @param  string $uri
     * @param  array $options
     * @return void
     */
    public function finaceRequest($method, $uri = '', array $options = [])
    {
        $response = new TrendyolBaseResponseModel();
        try {

            $base_url = $this->isTestStage? Endpoints::finance_test_base_url : Endpoints::finance_prod_base_url;
            $header = $this->getHeader($base_url);
            $financeClient = new  Client($header);
            $_response = $financeClient->request($method, $uri, $options);
            $response->status=true;
            $response->statusCode=$_response->getStatusCode();
            $response->response=\json_decode($_response->getBody());
        } catch (RequestException $e)
        {
            $response->status=false;
            $response->statusCode=$e->getCode();
            $response->errorMessage=$e->getMessage();

        }
        return $response;
    }

    function initializeFinanceClient()
    {
        $base_url = $this->isTestStage? Endpoints::finance_test_base_url : Endpoints::finance_prod_base_url;
        $header = $this->getHeader($base_url);
        unset($header["headers"]["Content-Type"]);
        unset($header["headers"]["Accept"]);
        $this->client = new  Client($header);
    }


}
