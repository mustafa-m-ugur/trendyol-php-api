<?php

namespace CMD\Trendyol\config;

abstract class Endpoints
{
    public const test_base_url = "https://stageapi.trendyol.com/stagesapigw/";
    public const prod_base_url = "https://api.trendyol.com/sapigw/";
    public const suppliers = 'suppliers';
    public const financeSubDomain = 'integration/finance/che/sellers';
    public const version = "v2";

    /**
     * Ürünlerle ilgili işlemnlerin yapılacağı endpointler
     */
    public const productFilering = "products";
    public const createProducts = "products";
    public const updateProducts = "products";
    public const checkBatchRequest = "products/batch-requests/@batchRequestId";
    public const categoryList = "product-categories";
    public const attributeList = "product-categories/@categoriId/attributes";
    public const brands = "brands";
    public const shipmentProviderList = "shipment-providers";
    public const addresses = "addresses";
    public const priceAndInventory = "/products/price-and-inventory";


    /**
     * Sipariş işlemleri ile endpointler
     *
     */
    public const orders = "orders";
    public const updateShippingCode = "@shipmentPackageId/update-tracking-number";
    public const updatePackageStatus = "shipment-packages/@Id";
    public const sendInvoiceLinks = "supplier-invoice-links";
    public const splitPackages = "shipment-packages/@shipmentPackageId/split-packages";
    public const changeCargoProviders = "shipment-packages/@shipmentPackageId/cargo-providers";
    public const testOrderCreate = "integration/oms/core";

    /**
     * İade işlemleri ile ilgili endpointler
     */
    public const claims = "claims";
    public const claimsCreate = "claims/create";
    public const claimApprove = "claims/@claimId/items/approve";
    public const claimsRejection = "claims/@claimId/issue";
    public const claimReasons = "claim-issue-reasons";


    /**
     * Soru Sorma işlemleri
     */
    public const getQuestions = "questions/filter";
    public const answerQuestion = "questions/@id/answers";

    /**
     * Muhasebe işlemleri
     */

    public const settlements = "settlements";
    public const otherfinancials = "otherfinancials";
    public const finance_test_base_url = "https://stageapi.trendyol.com/";
    public const finance_prod_base_url = "https://api.trendyol.com/";

    /**
     * Label İşlemleri
     */
    public const createLabel = "/common-label/@cargoTrackingNumber?format=ZPL";
    public const getLabel = "common-label/v2/@cargoTrackingNumber";

}
