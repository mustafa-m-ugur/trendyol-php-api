<?php
namespace CMD\Trendyol\models\basemodels;


abstract class OtherTransactionalType
{
    public const CashAdvance='CashAdvance';
    public const WireTransfer='WireTransfer';
    public const IncomingTransfer='IncomingTransfer';
    public const ReturnInvoice='ReturnInvoice';
    public const CommissionAgreementInvoice='CommissionAgreementInvoice';
    public const PaymentOrder='PaymentOrder';
    public const DeductionInvoices='DeductionInvoices';
}
