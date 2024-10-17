<?php

namespace LucasFerro0\BoletoWinner\Tests\Dummies;

use LucasFerro0\BoletoWinner\Bill;
use LucasFerro0\BoletoWinner\Converters\Converter;
use LucasFerro0\BoletoWinner\Validators\Validator;

class DummyBill extends Bill
{
    protected function useConverter(): Converter
    {
        return new class() implements Converter {
            public function toBarcode(Bill $bill): string
            {
                return 'converted bar code';
            }

            public function toWritableLine(Bill $bill): string
            {
                return 'converted writable line';
            }
        };
    }

    protected function useValidator(): Validator
    {
        return new class() implements Validator {
            public function verifyWritableLine(string $writableLine): bool
            {
                return true;
            }

            public function verifyBarcode(string $barcode): bool
            {
                return true;
            }
        };
    }
}
