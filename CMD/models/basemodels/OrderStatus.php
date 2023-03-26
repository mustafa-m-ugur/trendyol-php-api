<?php
namespace CMD\Trendyol\models\basemodels;

abstract class OrderStatus
{
    public const Created='Created';
    public const Picking='Picking';
    public const Invoiced='Invoiced';
    public const Shipped ='Shipped ';
    public const Cancelled='Cancelled';
    public const Delivered='Delivered';
    public const UnDelivered='UnDelivered';
    public const Returned='Returned';
    public const Repack='Repack';
    public const UnPacked='UnPacked';
    public const UnSupplied='UnSupplied';
}
