<?php
namespace CMD\Trendyol\models\basemodels;

abstract class ClaimStatus
{
    public const Created='Created';
    public const WaitingInAction='WaitingInAction';
    public const Invoiced='Invoiced';
    public const Unresolved ='Unresolved ';
    public const Rejected='Rejected';
    public const Cancelled='Cancelled';
    public const Accepted='Accepted';
    public const Returned='Returned';
    public const InAnalysis='InAnalysis';
}
