<?php

namespace ShojibFlamon\Service\Currency;

use ShojibFlamon\Service\Enums\Currencies;

class ConvertCurrency
{
    private $from;
    private $to;
    private $amount;
    private $decimalPoint;
    private $exchangeRates = [];

    public function __construct()
    {
        $this->setExchangeRates([
            Currencies::USD => 1.1497,
            Currencies::JPY => 129.53,
            Currencies::EUR => 1,
        ]);
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from): ConvertCurrency
    {
        $this->from = $from;
        return $this;
    }


    /**
     * @param mixed $to
     */
    public function setTo($to): ConvertCurrency
    {
        $this->to = $to;
        return $this;
    }


    /**
     * @param mixed $amount
     */
    public function setAmount($amount): ConvertCurrency
    {
        $this->amount = $amount;
        return $this;
    }


    /**
     * @param mixed $decimalPoint
     */
    public function setDecimalPoint($decimalPoint): ConvertCurrency
    {
        $this->decimalPoint = $decimalPoint;
        return $this;
    }


    /**
     * @param array $exchangeRates
     */
    public function setExchangeRates(array $exchangeRates)
    {
        $this->exchangeRates = $exchangeRates;
    }


    /**
     * @return string
     */
    public function conversion(): string
    {
        if ($this->amount < 0) return 'Amount must be greater then 0 (zero)';

        if (isset($this->exchangeRates[$this->from])) {
            if (!isset($this->exchangeRates[$this->to])) return 'Currency ' . $this->to . ' is not exist.';

            return number_format(($this->amount / $this->exchangeRates[$this->from])
                * $this->exchangeRates[$this->to], $this->decimalPoint, '.', '');
        }
        return 'Currency ' . $this->from . ' is not exist.';
    }
}