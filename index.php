<?php
declare(strict_types=1);

use ShojibFlamon\Service\CalculateFee\CommissionFee;
use ShojibFlamon\Service\Currency\ConvertCurrency;

require_once 'start.php';

$commissionFee = new CommissionFee(new ConvertCurrency(), 1000, 3);
$commissionFee->getCsvFromInput();
$commissionFee->calculate();
$commissionFee->printItem();
//print_r($commissionFee->getResult());
