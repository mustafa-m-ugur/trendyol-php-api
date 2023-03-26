# trendyol-php-api
Trendyol PHP Entegrasyonu


## Setup
```php
composer require mustafa-m-ugur/trendyol-api-php
```

## Client
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


```