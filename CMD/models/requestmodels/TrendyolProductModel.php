<?php
namespace CMD\Trendyol\models\requestmodels;


class TrendyolProductModel
{
    /**
     * barcode
     *
     * @var string max 40 karakter
     */
    public $barcode;
    /**
     * title
     *
     * @var string max 100 karakter
     */
    public $title;
    /**
     * productMainId
     *
     * @var string
     */
    public $productMainId;
    /**
     * brandId
     *
     * @var int Trendyol marka id /listTrendyolBrands
     * fonksiyonu aracılığı ile çekilecektir
     */
    public $brandId;
    /**
     * categoryId
     *
     * @var int Trendyol Kategori id listTrendyolCategories
     * fonksyionu ile temin edilecek
     */
    public $categoryId;
    /**
     * quantity
     *
     * @var int
     */
    public $quantity;
    /**
     * stockCode
     *
     * @var string
     * Tedarikçi iç sistemindeki unique stok kodu
     */
    public $stockCode;
    /**
     * dimensionalWeight
     *
     * @var double
     */
    public $dimensionalWeight;
    /**
     * description
     *
     * @var string - Html bilgisi de içerebilir
     */
    public $description;
    /**
     * currencyType
     *
     * @var string ISO parabirimi kodu
     */
    public $currencyType;
    /**
     * listPrice
     *
     * @var double
     * 	Ürün liste fiyatı(Satış fiyatı düşük olunca üstü çizilen fiyat) PSF
     */
    public $listPrice;
    /**
     * salePrice
     *
     * @var double
     * Ürün satış fiyatı TSF
     */
    public $salePrice;
    /**
     * vatRate
     *
     * @var double Ürün KDV oranı 0,1,8,18 gibi olmalı
     */
    public $vatRate;
    /**
     * cargoCompanyId
     *
     * @var integer
     */
    public $cargoCompanyId;
    /**
     * images
     *
     * @var string
     */
    public $images;
    /**
     * attributes
     *
     * @var array of models\basemodels\Attribute
     */
    public $attributes;

    public function rules()
    {
        return [
            ["barcode",'max'=>40],
            ["title",'max'=>100],
        ];
    }
}
