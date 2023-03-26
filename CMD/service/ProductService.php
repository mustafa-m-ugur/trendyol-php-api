<?php

namespace CMD\Trendyol\service;

use CMD\Trendyol\config\Endpoints;
use CMD\Trendyol\models\requestmodels\CreateUpdateRequestProductModel;


class ProductService extends TrendyolBaseService
{
    /*** #region Product Proccess */
    /**
     * productFilter
     *
     * @param int $page
     * @param int $size
     * @return TrendyolBaseResponseModel
     */
    public function productFilter($page, $size)
    {
        $endpoint = $this->getUrl("products?page={$page}&size={$size}");
        return $this->request("GET", $endpoint);
    }

    /**
     * productTransfer
     *
     * @param CreateUpdateRequestProductModel $productRequest
     * @param bool $isUpdate
     * @return TrendyolBaseResponseModel
     */
    public function productTransfer(CreateUpdateRequestProductModel $productRequest, $isUpdate = false)
    {
        //TODO: if(!$orderRequest->validate()) throw new \Exception($orderRequest->errors);
        $endpoint = $this->getUrl(Endpoints::version . "/" . Endpoints::createProducts);
        $method = $isUpdate ? "PUT" : "POST";
        $payload = ['body' => \json_encode($productRequest)];
        return $this->request($method, $endpoint, $payload);
    }

    /**
     * checkBatchRequest
     *
     * @param int $batchRequestId
     * @return TrendyolBaseResponseModel
     */
    public function checkBatchRequest($batchRequestId)
    {
        $endpoint = $this->getUrl(str_replace("@batchRequestId", $batchRequestId, Endpoints::checkBatchRequest));
        return $this->request("GET", $endpoint);
    }

    /**
     * listTrendyolCategories
     *
     * @return TrendyolBaseResponseModel
     */
    public function listTrendyolCategories()
    {
        $endpoint = $this->getUrlWithoutSuppliers(Endpoints::categoryList);
        return $this->request("GET", $endpoint);
    }

    /**
     * listTrendyolAttributes
     *
     * @param int $categoriID
     * @return TrendyolBaseResponseModel
     */
    public function listTrendyolAttributes($categoriID)
    {
        $endpoint = $this->getUrlWithoutSuppliers(str_replace("@categoriId", $categoriID, Endpoints::attributeList));
        return $this->request("GET", $endpoint);
    }

    /**
     * listTrendyolBrands
     *
     * @return TrendyolBaseResponseModel
     */
    public function listTrendyolBrands($page)
    {
        $endpoint = $this->getUrlWithoutSuppliers(Endpoints::brands) . '?page=' . $page;
        return $this->request("GET", $endpoint);
    }

    /**
     * searchTrendyolBrands
     *
     * @return TrendyolBaseResponseModel
     */
    public function searchTrendyolBrands($name)
    {
        $endpoint = $this->getUrlWithoutSuppliers(Endpoints::brands) . '/by-name?name=' . $name;
        return $this->request("GET", $endpoint);
    }

    /**
     * listProviders
     *
     * @return TrendyolBaseResponseModel
     */
    public function listProviders()
    {
        $endpoint = $this->getUrlWithoutSuppliers(Endpoints::shipmentProviderList);
        return $this->request("GET", $endpoint);
    }

    /**
     * getAddressesList
     *
     * @return TrendyolBaseResponseModel
     */
    public function getAddressesList()
    {
        $endpoint = $this->getUrl(Endpoints::addresses);
        return $this->request("GET", $endpoint);
    }

    /**
     * updateStockAndPriceTransfer
     *
     * @param array $listOfStockAndPriceItems
     * @return TrendyolBaseResponseModel
     */
    public function updateStockAndPriceTransfer($listOfStockAndPriceItems)
    {
        $endpoint = $this->getUrl(Endpoints::priceAndInventory);
        $payload = ['body' => \json_encode(["items" => $listOfStockAndPriceItems])];
        return $this->request("POST", $endpoint, $payload);
    }


    /** #endregion Product  Proccess*/
}
