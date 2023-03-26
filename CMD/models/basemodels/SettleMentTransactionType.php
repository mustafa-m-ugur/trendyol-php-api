<?php
namespace CMD\Trendyol\models\basemodels;


abstract class SettleMentTransactionType
{
    public const Sale='Sale';
    public const Return='Return';
    public const Discount='Discount';
    public const DiscountCancel='DiscountCancel';
    public const Coupon='Coupon';
    public const CouponCancel='CouponCancel';
    public const ProvisionPositive='ProvisionPositive';
    public const ProvisionNegative='ProvisionNegative';
}
