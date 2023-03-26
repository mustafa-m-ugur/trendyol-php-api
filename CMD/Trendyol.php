<?php
/**
 * @author Mustafa Uğur
 * @create date 2021-06-29 16:31:17
 * @modify date 2021-06-29 16:31:17
 * @desc Bu modül, Trendyol entegrasyon çalışmasının servis iletişim katmanıdır.
 * Temel Usage ile ilgili bilgiliyi  README.md 'dosyasında
 * Ayrıntılı Usage dökümanları docs klasörünün altında bulabilirsiniz
 */

namespace CMD\Trendyol;

use CMD\Trendyol\config\Credentials;
use CMD\Trendyol\service\ProductService;
use CMD\Trendyol\service\OrderService;
use CMD\Trendyol\service\ReturnService;
use CMD\Trendyol\service\QuestionService;
use CMD\Trendyol\service\FinanceService;
use CMD\Trendyol\service\LabelService;

class Trendyol
{
    public $product;
    public $order;
    public $return;
    public $question;
    public $finance;
    public $label;
    public $username;
    public $password;
    public $supplierId;
    public $isTestStage;

    public function __construct($username, $password, $supplierId, $isTestStage = true)
    {
        $credentials = new Credentials();
        $credentials->username = $username;
        $credentials->password = $password;
        $credentials->supplierId = $supplierId;
        $this->product = new ProductService($isTestStage, $credentials);
        $this->order = new OrderService($isTestStage, $credentials);
        $this->return = new ReturnService($isTestStage, $credentials);
        $this->question = new QuestionService($isTestStage, $credentials);
        $this->finance = new FinanceService($isTestStage, $credentials);
        $this->label = new LabelService($isTestStage, $credentials);
    }


}
