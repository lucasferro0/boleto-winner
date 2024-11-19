<?php

namespace BoletoWinner;

use BoletoWinner\Converters\ConvenioConverter;
use BoletoWinner\Converters\Converter;
use BoletoWinner\Validators\ConvenioValidator;
use BoletoWinner\Validators\Validator;

class Convenio extends Bill
{
    const USES_MODULE_10 = [6, 7]; // TODO pick better name
    const AVAILABLE_CODES = [6, 7, 8, 9]; // TODO pick better name
    const SEGMENT_IDENTIFICATION = [1, 2, 3, 4, 5, 6, 7, 9];

    /**
     * {@inheritdoc}
     */
    protected function useConverter(): Converter
    {
        return new ConvenioConverter();
    }

    /**
     * {@inheritdoc}
     */
    protected function useValidator(): Validator
    {
        return new ConvenioValidator();
    }
}
