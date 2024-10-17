<?php

namespace LucasFerro0\BoletoWinner;

use LucasFerro0\BoletoWinner\Converters\BoletoConverter;
use LucasFerro0\BoletoWinner\Converters\Converter;
use LucasFerro0\BoletoWinner\Validators\BoletoValidator;
use LucasFerro0\BoletoWinner\Validators\Validator;

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
