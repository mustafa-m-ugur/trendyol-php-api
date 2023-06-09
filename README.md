# trendyol-php-api

Trendyol PHP Entegrasyonu

### License
- See [ChangeLog](https://github.com/mustafa-m-ugur/trendyol-php-api/blob/main/LICENSE)


## Setup

```php
composer require mustafa-m-ugur/trendyol-api-php
```

## Client & ProductService

```php

use CMD\Trendyol\Trendyol;
include "vendor/autoload.php";

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


```

## OrderService

```php

use CMD\Trendyol\Trendyol;
include "vendor/autoload.php";

$isTestStage = true;
$trendyol = new Trendyol('xxxxxxx', 'xxxxxxx', 'xxxx', $isTestStage);


/**
 *
 * @description Trendyol Üzerindeki Sipariş Listesi.
 *
 */
    $date = new \DateTime("2023-03-26");
    $getOrderRequest->startDate = $date->getTimestamp();
    $date->modify("+1 week");
    $getOrderRequest->endDate= $date->getTimestamp();
    $getOrderRequest->page=10;
    $getOrderRequest->size=10;
    $getOrderRequest->orderByDirection=DirectionType::DESC;
    //get-orders
    $response = $trendyol->order->getOrders($getOrderRequest);
    print_r($response->response["content"]);
    var_dump($response);
    
    /**
 *
 * @description Kargo Takip Numarasını Güncelleme.
 *
 */
 
    $result = $trendyol->order->updateTrackingNumber(44505271,"1Z3X9A776803647522");
    print_r($result->response);
    var_dump($result);
 
 
 /**
 *
 * @description Sipariş durumunu güncelleme.
 *
 */
 
 $status = new PackageStatusUpdateRequestModel();
$status->lines = [
    new PackageLine(123456,1),
];
$status->params = new PackageParams("EME2018000025208");
$status->status = OrderStatus::Picking;
$result = $trendyol->order->updatePackageStatus(44505271,$status);
var_dump($result);
 
 
 /**
 *
 * @description Fatura bilgisi Güncelleme.
 *
 */
 
 
 $invoiceLink = new SendInvoiceLinkRequestModel();
$invoiceLink->invoiceLink = "https://extfatura.faturaentegratoru.com/324523-34523-52345-3453245.pdf";
$invoiceLink->shipmentPackageId = 44505271;
//body yok sadece 201 dönüyor
$result = $trendyol->order->sendInvoiceLink($invoiceLink);
var_dump($result);
 
 
 /**
 *
 * @description Sipariş Paketlerini Parçalama.
 *
 */
 
$split = new OrderSplitRequestModel();
$split->splitPackages = [
    new SplitOrderDetails([
        new OrderLine(123456,1),
        new OrderLine(123456,2),
        new OrderLine(123456,3),
    ])
];
$shipmentPackageID = "44505271";
$result = $trendyol->order->splitOrderPackage($shipmentPackageID,$split);
var_dump($result->response);
 
 
 /**
 *
 * @description Kargo firması güncelleme.
 *
 */
$shipmentPackageID = 44505271;
$result =$trendyol->order->changeCargoCompany($shipmentPackageID,CargoCompanies::YKMP);
///response body yok sadece 200 dönüyor
var_dump($result);

```
Diğer servisleri [https://developers.trendyol.com/](https://developers.trendyol.com/) üzerindeki dökümantasyondan örneklendirebilirsiniz