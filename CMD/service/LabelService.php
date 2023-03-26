<?php
namespace CMD\Trendyol\service;


use CMD\Trendyol\config\Endpoints;
use stdClass;

class LabelService extends TrendyolBaseService
{
    /**
     * createLabel
     *
     * @param  string $trackingNumber takip için tanımlayacağınız numara
     * @param  integer $boxQuantity gönderi kaç parçadan oluşıyor
     * @return TrendyolBaseResponseModel
     */
    public function createLabel($trackingNumber,$boxQuantity=1)
    {
        $endpoint = $this->getUrl(str_replace("@cargoTrackingNumber",$trackingNumber,Endpoints::createLabel));
        $label = new stdClass();
        $label->boxQuantity = $boxQuantity;
        $payload = ["body"=>\json_encode($label)];
        return $this->request("POST",$endpoint,$payload);
    }
    public function getLabel($trackingNumber)
    {
        $endpoint = $this->getUrl(str_replace("@cargoTrackingNumber",$trackingNumber,Endpoints::getLabel));
        $this->request("GET",$endpoint);
    }
}
