<?php
namespace CMD\Trendyol\service;

use CMD\Trendyol\config\Endpoints;
use CMD\Trendyol\models\requestmodels\ClaimRequestModel;
use CMD\Trendyol\models\basemodels\TrendyolBaseResponseModel;
use CMD\Trendyol\models\requestmodels\ClaimCreateRequestModel;
use CMD\Trendyol\models\requestmodels\ClaimApproveRequestModel;
use CMD\Trendyol\models\requestmodels\ClaimRejectionRequestModel;

class ReturnService extends TrendyolBaseService
{
    /**
     * getClaims
     *
     * @param  ClaimRequestModel $claimRequest
     * @return TrendyolBaseResponseModel
     */
    public function getClaims(ClaimRequestModel $claimRequest)
    {
        try
        {
            $querystringParameters=[];
            foreach ($claimRequest as $key => $value)
            {
                if($value!=null)
                {
                    $querystringParameters[$key]=$value;
                }
            }
            $queryString =  http_build_query($querystringParameters);
            $endpoint  = $this->getUrl(Endpoints::claims);
            return $this->request("GET",$endpoint."?".$queryString);

        } catch (\Throwable $th)
        {
            $result = new TrendyolBaseResponseModel();
            $result->status=false;
            $result->errorMessage=$th->getMessage();
            return  $result;
        }
    }

    /**
     * createClaim
     *
     * @param  ClaimCreateRequestModel $claim
     * @return TrendyolBaseResponseModel
     */
    public function createClaim(ClaimCreateRequestModel $claim)
    {
        $endpoint = $this->getUrl(Endpoints::claimsCreate);
        $payload = ["body"=>\json_encode($claim)];
        return $this->request("POST",$endpoint,$payload);
    }
    /**
     * getCliamReasons
     *
     * @return TrendyolBaseResponseModel
     */
    public function getCliamReasons()
    {
        $endpoint = $this->getUrlWithoutSuppliers(Endpoints::claimReasons);
        return $this->request("GET",$endpoint);
    }
    /**
     * approveClaim
     *
     * @param  int $claimId
     * @param  ClaimApproveRequestModel $claimApproveRequest
     * @return TrendyolBaseResponseModel
     */
    public function approveClaim($claimId,ClaimApproveRequestModel $claimApproveRequest)
    {
        $endpoint = $this->getUrlWithoutSuppliers(str_replace("@claimId",$claimId,Endpoints::claimApprove));
        $payload = ["body"=>\json_encode($claimApproveRequest)];
        return $this->request("PUT",$endpoint,$payload);
    }
    /**
     * rejectClaim
     *
     * @param  int $claimId
     * @param  ClaimRejectionRequestModel $claimRejectRequest
     * @return TrendyolBaseResponseModel
     */
    public function rejectClaim($claimId,ClaimRejectionRequestModel $claimRejectRequest)
    {
        $querystringParameters=[];
        foreach ($claimRejectRequest as $key => $value)
        {
            if($value!=null)
            {
                $querystringParameters[$key]=$value;
            }
        }
        $queryString =  http_build_query($querystringParameters);
        $endpoint  = $this->getUrlWithoutSuppliers(str_replace("@claimId",$claimId,Endpoints::claimsRejection));
        ///ilginç bir şekilde query stringle post gönderiyoruz.
        return $this->request("POST",$endpoint."?".$queryString);
    }
}
