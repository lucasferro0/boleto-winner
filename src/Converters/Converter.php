<?php

namespace LucasFerro0\BoletoWinner\Converters;

use LucasFerro0\BoletoWinner\Bill;

interface Converter
{
    /**
     * Generates a barcode from the bill writable line.
     */
    public function toBarcode(Bill $bill): string;

    /**
     * Generates a writable line from the bill barcode.
     */
    public function toWritableLine(Bill $bill): string;
}
