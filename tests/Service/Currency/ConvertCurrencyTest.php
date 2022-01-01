<?php

namespace ShojibFlamon\Test\Currency;

use ShojibFlamon\Service\Currency\ConvertCurrency;
use PHPUnit\Framework\TestCase;

class ConvertCurrencyTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testConvertCurrency(string $from, string $to, string $amount, string $expected): void
    {
        $convertCurrency = new ConvertCurrency();

        $this->assertSame(
            $expected,
            $convertCurrency->setAmount($amount)
                ->setFrom($from)
                ->setTo($to)
                ->setDecimalPoint(2)
                ->conversion()
        );
    }

    public function additionProvider(): array
    {
        return [
            'EUR TO JPY' => ['EUR', 'JPY', '1', '129.53'],
            'JPY TO EUR' => ['JPY', 'EUR', '129.53', '1.00'],
            'EUR TO USD' => ['EUR', 'USD', '1', '1.15'],
            'USD TO EUR' => ['USD', 'EUR', '1.15', '1.00'],
            'EUR TO EUR' => ['EUR', 'EUR', '1', '1.00'],
            'AAA TO EUR' => ['AAA', 'EUR', '1', 'Currency AAA is not exist.'],
            'EUR TO BBB' => ['EUR', 'BBB', '1', 'Currency BBB is not exist.'],
            'EUR TO JPG' => ['EUR', 'JPG', '-1', 'Amount must be greater then 0 (zero)'],
        ];
    }
}
