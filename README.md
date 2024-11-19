# Boleto Winner

Pacote para validar, converter e obter dados contidos nos códigos de barra de
boletos e convênios.

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

## Usage

``` php
// Converte linha digitável para código de barras

BoletoWinner::toBarcode($writableLine)

// Converte código de barra para linha digitável

BoletoWinner::toWritableLine($barcode)

// Valida código de barra de boleto bancário

(new BoletoValidator())->verifyBarcode($barcode);

// Valida código de barra de boleto de convênio

(new ConvenioValidator())->verifyBarcode($barcode);

```

### Testing

``` bash
composer test
```

### Security

Se você descobrir qualquer problema relacionado à segurança, envie um e-mail para lucasferrobrandao@gmail.com em vez de usar o rastreador de issues.

## Credits

- [Lucas Ferro](https://github.com/lucasferro0)
- [All Contributors](../../contributors)

## License

Por favor, veja [License File](LICENSE.md) para mais informações.
