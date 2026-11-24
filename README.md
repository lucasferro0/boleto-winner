# Boleto Winner

> [!WARNING]
> **Este projeto está depreciado** e não recebe mais manutenção, correções ou novas versões.
>
> Utilize o **[Boleto Kit](https://github.com/lucasferro0/boleto-kit)**, seu sucessor,
> que oferece validação e conversão de código de barras e linha digitável de boletos
> bancários e de convênio, seguindo os padrões da FEBRABAN.

## Migração para o Boleto Kit

Remova o pacote antigo e instale o Boleto Kit:

```bash
composer remove lucasferro0/boleto-winner
composer require lucasferro0/boleto-kit
```

Todos os recursos do Boleto Kit ficam disponíveis pela classe `BoletoKit\BoletoKit`.
Consulte o [README do Boleto Kit](https://github.com/lucasferro0/boleto-kit#readme)
para a documentação completa da nova API.

## Sobre

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
contida em boletos e convênios de "código de barras". Entretanto, esses números,
que vez ou outra temos de digitar manualmente, são na verdade a **linha digitável**.
O **código de barras** propriamente dito é a sequência de 44 dígitos codificada na
representação gráfica (as barras), lida por leitores ópticos.

![Conta de convênio](resources/samples/sample_darf.png)

## Uso legado (não recomendado)

> [!CAUTION]
> As instruções abaixo são mantidas apenas como referência histórica.
> Para novos projetos, utilize o [Boleto Kit](https://github.com/lucasferro0/boleto-kit).

### Instalação

```bash
composer require lucasferro0/boleto-winner
```

### Uso

```php
// Converte linha digitável para código de barras

BoletoWinner::toBarcode($writableLine);

// Converte código de barra para linha digitável

BoletoWinner::toWritableLine($barcode);

// Valida código de barra de boleto bancário

(new BoletoValidator())->verifyBarcode($barcode);

// Valida código de barra de boleto de convênio

(new ConvenioValidator())->verifyBarcode($barcode);
```

### Testando

```bash
composer test
```

## Segurança

Se você descobrir qualquer problema relacionado à segurança, envie um e-mail para lucasferrobrandao@gmail.com em vez de usar o rastreador de issues.

## Créditos

- [Lucas Ferro](https://github.com/lucasferro0)
- [All Contributors](../../contributors)

## Licença

Por favor, veja [License File](LICENSE.md) para mais informações.
