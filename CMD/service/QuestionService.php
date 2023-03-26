<?php
namespace CMD\Trendyol\service;


use CMD\Trendyol\config\Endpoints;


class QuestionService extends TrendyolBaseService
{
    /**
     * getQuestions
     *
     * @return TrendyolBaseResponseModel
     */
    public function getQuestions()
    {
        $endpoint  = $this->getUrl(Endpoints::getQuestions);
        return $this->request("GET",$endpoint);
    }
    /**
     * answerQuestion
     *
     * @param  int $questionID
     * @param  String $answer
     * @return TrendyolBaseResponseModel
     */
    public function answerQuestion($questionID,$answer)
    {
        $endpoint = $this->getUrl(str_replace("@id",$questionID,Endpoints::answerQuestion));
        $payload = ["body"=>\json_encode(["text"=>$answer])];
        return $this->request("POST",$endpoint,$payload);
    }
}
