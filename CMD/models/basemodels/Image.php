<?php
namespace CMD\Trendyol\models\basemodels;
class Image
{
    /**
     * img
     *
     * @var string
     */
    public $url;
    /**
     * __construct
     *
     * @param  string $img
     * @return void
     */
    function __construct($img)
    {
        $this->url =$img;
    }
}
