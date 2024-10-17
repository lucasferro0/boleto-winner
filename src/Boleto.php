<?php

namespace lucasferro0\BoletoWinner;

use lucasferro0\BoletoWinner\Converters\BoletoConverter;
use lucasferro0\BoletoWinner\Converters\Converter;
use lucasferro0\BoletoWinner\Validators\BoletoValidator;
use lucasferro0\BoletoWinner\Validators\Validator;

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
