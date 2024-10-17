# Boleto Winner

Pacote para validar, converter e obter dados contidos nos códigos de barra de boletos e convênios.

## Nomenclaturas

### Boleto vs Convênio

Uma conta de convênio (também conhecida como "conta de
concessionária") geralmente é emitida por concessionárias de serviço, como no
caso de grande parte das contas de energia elétrica, de telefonia, de gás,
dentre outras. Podem ainda ser oriundas de órgãos governamentais, como
acontece com o DAS (Documento de Arrecadação do Simples Nacional),
DARF (Documento de Arrecadação de Receitas Federais),
IPTU (Imposto Predial e Territorial Urbano), etc.

### Código de Barras vs Linha Digitável

Popularmente chamamos os números que aparecem acima da representação gráfica
contida em boletos e convênios de "código de barras", o que. Entretanto, esses números
que vez ou outra temos de digitar manualmente é na verdade  

![Conta de convênio](resources/samples/sample_darf.png)

## Installation

You can install the package via composer:

```bash
composer require lucasferro0/boleto-winner
```

## Usage for converters

```php
$writableLine = BoletoWinner::toWritableLine($barcode);

$barcode = BoletoWinner::toBarcode($writableLine);
```

## Usage to validate bank bill

```php
$isBankBill = (new BoletoValidator())->verifyWritableLine($writableLine);

$isBankBill = (new BoletoValidator())->verifyBarcode($barcode);
```

## Usage to validate convenant bill

```php
$isConvenantBill = (new ConvenioValidator())->verifyWritableLine($writableLine);

$isConvenantBill = (new ConvenioValidator())->verifyBarcode($barcode);
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email lucasferrobrandao@gmail.com instead of using the issue tracker.

## Credits

- [Lucas Ferro](https://github.com/lucasferro0)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
