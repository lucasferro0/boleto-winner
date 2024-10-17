<?php

namespace lucasferro0\BoletoWinner\Tests\Dummies;

use lucasferro0\BoletoWinner\Bill;
use lucasferro0\BoletoWinner\Converters\Converter;
use lucasferro0\BoletoWinner\Validators\Validator;

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
