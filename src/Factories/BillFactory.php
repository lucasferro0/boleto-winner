<?php

namespace BoletoWinner\Factories;

use BoletoWinner\Bill;
use BoletoWinner\Boleto;
use BoletoWinner\Convenio;
use BoletoWinner\Exceptions\BoletoWinnerException;

class BillFactory
{
    /**
     * Bills supported.
     *
     * @var array|string[]
     */
    protected array $bills = [
        'boleto' => Boleto::class,
        'convenio' => Convenio::class,
    ];

    /**
     * The singleton instance.
     */
    private static ?BillFactory $instance = null;

    protected function __construct()
    {
        // Preventing direct construction calls with the `new` operator.
    }

    /**
     * Get the singleton class instance or creates one if it's not set yet.
     */
    public static function getInstance(): self
    {
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new static();

        return self::$instance;
    }

    /**
     * Returns an instance of the Bill class for the given type.
     *
     * @throws BoletoWinnerException
     */
    public function createBillInstance(string $type): Bill
    {
        if (! isset($this->bills[$type])) {
            throw BoletoWinnerException::unsupportedType($type);
        }

        return new $this->bills[$type]();
    }

    /**
     * @throws BoletoWinnerException
     */
    public function createFromBarcodeOrWritableLine(string $barcodeOrWritableLine): Bill
    {
        $input = $this->sanitizeInput($barcodeOrWritableLine);
        foreach ($this->bills as $billClass) {
            $bill = new $billClass();
            $bill->setBarcode($input);
            if ($bill->isBarcodeValid()) {
                return $bill;
            }

            $bill = new $billClass();
            $bill->setWritableLine($input);
            if ($bill->isWritableLineValid()) {
                return $bill;
            }
        }

        throw BoletoWinnerException::invalidInput($barcodeOrWritableLine);
    }

    /**
     * @throws BoletoWinnerException
     */
    public function createFromWritableLine(string $writableLine): Bill
    {
        $input = $this->sanitizeInput($writableLine);
        foreach ($this->bills as $billClass) {
            $bill = new $billClass();
            $bill->setWritableLine($input);
            if ($bill->isWritableLineValid()) {
                return $bill;
            }
        }

        throw BoletoWinnerException::invalidInput($writableLine);
    }

    /**
     * @throws BoletoWinnerException
     */
    public function createFromBarcode(string $barcode): Bill
    {
        $input = $this->sanitizeInput($barcode);
        foreach ($this->bills as $billClass) {
            $bill = new $billClass();
            $bill->setBarcode($input);
            if ($bill->isBarcodeValid()) {
                return $bill;
            }
        }

        throw BoletoWinnerException::invalidInput($barcode);
    }

    /**
     * @throws BoletoWinnerException
     */
    private function sanitizeInput(string $barcodeOrWritableLine): string
    {
        $input = preg_replace('/[^0-9]/', '', $barcodeOrWritableLine);
        if (empty($input)) {
            throw BoletoWinnerException::inputRequired();
        }

        return $input;
    }
}
