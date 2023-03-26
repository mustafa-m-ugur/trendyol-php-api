<?php

use CMD\Trendyol\models\basemodels\Image;
use CMD\Trendyol\models\requestmodels\CreateUpdateRequestProductModel;
use CMD\Trendyol\models\requestmodels\StockAndPriceUpdateRequestModel;
use CMD\Trendyol\models\requestmodels\TrendyolProductModel;
use CMD\Trendyol\Trendyol;

$isTestStage = true;
$trendyol = new Trendyol('xxxxxxx', 'xxxxxxx', 'xxxx', $isTestStage);

/**
 *
 * @description Trendyol Üzerindeki Ürünleri Görüntüler.
 *
 */
$response = $trendyol->product->productFilter(10, 20);


/**
 *
 * @description Kategori Listesi.
 *
 */
$response = $trendyol->product->listTrendyolCategories();
print_r($response->response["categories"]);
var_dump($response);

/**
 *
 * @description Ürün Attrubute Kodları Listesi.
 *
 */
$response = $trendyol->product->listTrendyolAttributes(123455);
var_dump($response);

/**
 *
 * @description Taşıyıcı Firmaların Listesi.
 *
 */
$response = $trendyol->product->listProviders();
var_dump($response);

/**
 *
 * @description Marka Listesi.
 *
 */
$response = $trendyol->product->listTrendyolBrands(123455);
print_r($response->response["brands"]);
var_dump($response);

/**
 *
 * @description İade ve Teslimat Adresleri Listesi.
 *
 */
$trendyol->product->getAddressesList();
$response =  $trendyol->product->getAddressesList();
var_dump($response);


/**
 *
 * @description Ürün Oluşturma.
 *
 */

$product = new TrendyolProductModel();
$product->barcode = "barcode-Deneme123";
$product->title = "Bebek  bezi";
$product->productMainId = "1234BT";
$product->brandId = 1791;
$product->categoryId = 411;
$product->quantity = 100;
$product->stockCode = "STK-111";
$product->dimensionalWeight = 2;
$product->description = "Ürün açıklama bilgisi";
$product->currencyType = "TRY";
$product->listPrice = 250.99;
$product->salePrice = 120.99;
$product->vatRate = 18;
$product->cargoCompanyId = 10;
$product->images = [
    new Image("https://www.sampleadress/path/folder/image_1.jpg"),
];
$product->attributes = [
    new Attribute([
        'attributeId' => 338,
        'attributeValueId' => 6980
    ]),
    new Attribute([
        'attributeId' => 338,
        'customAttributeValue' => 'PUDRA'
    ])
];

$request = new CreateUpdateRequestProductModel();
$request->items = [
    $product
];

$isupdate = false; /// Burası true olduğunda create değil update isteği göndermiş oluyoruz
$response = $trendyol->product->productTransfer($request, $isupdate);
echo $response->response["batchRequestId"];
var_dump($response);


/**
 *
 * @description Stok ve Fiyat Güncelleme.
 *
 */
$listOfStockAndPriceItems=[
    new StockAndPriceUpdateRequestModel("8680000000",100,112.85,113),
    new StockAndPriceUpdateRequestModel("8680000001",10,112.85,113),
];
$result  = $trendyol->product->updateStockAndPriceTransfer($listOfStockAndPriceItems);
print_r($result->response["batchRequestId"]);
var_dump($result);