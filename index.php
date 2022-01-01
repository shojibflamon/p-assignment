<?php

use ShojibFlamon\Service\CalculateFee\CommissionFee;
use ShojibFlamon\Service\Currency\ConvertCurrency;


require_once 'start.php';


$commissionFee = new CommissionFee(New ConvertCurrency(),1000,3);
$commissionFee->getCsvFromInput();
$commissionFee->calculate();
$commissionFee->printItem();
//print_r($commissionFee->getResult());

//$ab = new \ShojibFlamon\Service\My\CsvFileIerator('input.csv');
//print_r($ab);

