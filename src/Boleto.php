<?php

namespace BoletoWinner;

use BoletoWinner\Converters\BoletoConverter;
use BoletoWinner\Converters\Converter;
use BoletoWinner\Validators\BoletoValidator;
use BoletoWinner\Validators\Validator;

class Boleto extends Bill
{
    /**
     * {@inheritdoc}
     */
    protected function useConverter(): Converter
    {
        return new BoletoConverter();
    }

    /**
     * {@inheritdoc}
     */
    protected function useValidator(): Validator
    {
        return new BoletoValidator();
    }
}
