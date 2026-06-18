# README - Estrutura de Dados de Cliente e Pedido

Este documento descreve a estrutura dos objetos JSON de **clientes** e **pedidos** utilizados no sistema.

## Visão geral

O sistema trabalha com duas entidades principais:

- **clientes**: armazena as informações cadastrais do cliente
- **pedido**: armazena as informações de uma compra realizada pelo cliente

---

## Estrutura de Cliente

Representa os dados pessoais e o status do cliente no sistema.

### Exemplo

```json
{
  "clientes": {
    "id_cliente": 1042,
    "nome_completo": "Ana Paula Ferreira",
    "cpf": "321.654.987-00",
    "data_nascimento": "1995-08-14",
    "email": "ana.ferreira@email.com",
    "telefone": "(19) 99234-5678",
    "cidade": "Americana",
    "estado": "SP",
    "total_pedidos": 17,
    "ativo": true
  }
}
```

### Campos

| Campo | Tipo | Descrição |
|------|------|-----------|
| `id_cliente` | integer | Identificador único do cliente |
| `nome_completo` | string | Nome completo do cliente |
| `cpf` | string | CPF do cliente |
| `data_nascimento` | string | Data de nascimento no formato `YYYY-MM-DD` |
| `email` | string | E-mail do cliente |
| `telefone` | string | Telefone para contato |
| `cidade` | string | Cidade do cliente |
| `estado` | string | Estado do cliente |
| `total_pedidos` | integer | Quantidade total de pedidos realizados |
| `ativo` | boolean | Indica se o cliente está ativo no sistema |

---

## Estrutura de Pedido

Representa os dados de uma compra vinculada a um cliente.

### Exemplo

```json
{
  "pedido": {
    "id_pedido": 1,
    "id_cliente": 1,
    "data_pedido": "2026-04-01",
    "status": "em_transporte",
    "valor_total": 559.8,
    "valor_frete": 19.9,
    "metodo_pagamento": "Pix",
    "transportadora": "Correios",
    "previsao_entrega": "2026-04-05",
    "produtos": [
      "Controle Xbox Series",
      "Headset HyperX Cloud II"
    ]
  }
}
```

### Campos

| Campo | Tipo | Descrição |
|------|------|-----------|
| `id_pedido` | integer | Identificador único do pedido |
| `id_cliente` | integer | Identificador do cliente relacionado ao pedido |
| `data_pedido` | string | Data em que o pedido foi realizado no formato `YYYY-MM-DD` |
| `status` | string | Status atual do pedido |
| `valor_total` | number | Valor total da compra |
| `valor_frete` | number | Valor do frete |
| `metodo_pagamento` | string | Forma de pagamento utilizada |
| `transportadora` | string | Empresa responsável pela entrega |
| `previsao_entrega` | string | Data prevista de entrega no formato `YYYY-MM-DD` |
| `produtos` | array | Lista de produtos incluídos no pedido |

---

## Relacionamento entre Cliente e Pedido

O campo `id_cliente` em `pedido` é responsável por relacionar o pedido a um cliente cadastrado.

### Observação importante

No exemplo fornecido, existe uma divergência entre os IDs:

- no objeto `clientes`, o `id_cliente` é `1042`
- no objeto `pedido`, o `id_cliente` é `1`

Para manter a integridade dos dados, o ideal é que ambos tenham o mesmo valor quando o pedido pertencer a esse cliente.

### Exemplo corrigido

```json
{
  "pedido": {
    "id_pedido": 1,
    "id_cliente": 1042,
    "data_pedido": "2026-04-01",
    "status": "em_transporte",
    "valor_total": 559.8,
    "valor_frete": 19.9,
    "metodo_pagamento": "Pix",
    "transportadora": "Correios",
    "previsao_entrega": "2026-04-05",
    "produtos": [
      "Controle Xbox Series",
      "Headset HyperX Cloud II"
    ]
  }
}
```

---

## Exemplo de uso conjunto

```json
{
  "clientes": {
    "id_cliente": 1042,
    "nome_completo": "Ana Paula Ferreira",
    "cpf": "321.654.987-00",
    "data_nascimento": "1995-08-14",
    "email": "ana.ferreira@email.com",
    "telefone": "(19) 99234-5678",
    "cidade": "Americana",
    "estado": "SP",
    "total_pedidos": 17,
    "ativo": true
  },
  "pedido": {
    "id_pedido": 1,
    "id_cliente": 1042,
    "data_pedido": "2026-04-01",
    "status": "em_transporte",
    "valor_total": 559.8,
    "valor_frete": 19.9,
    "metodo_pagamento": "Pix",
    "transportadora": "Correios",
    "previsao_entrega": "2026-04-05",
    "produtos": [
      "Controle Xbox Series",
      "Headset HyperX Cloud II"
    ]
  }
}
```

---

## Possíveis valores para `status`

Alguns exemplos de status de pedido:

- `pendente`
- `pago`
- `processando`
- `enviado`
- `em_transporte`
- `entregue`
- `cancelado`

---

## Formato de datas

Todas as datas seguem o padrão:

```text
YYYY-MM-DD
```

Exemplo:

- `2026-04-01`

---

## Tecnologias compatíveis

Esse formato JSON pode ser utilizado facilmente em:

- APIs REST
- bancos NoSQL
- aplicações web
- sistemas de e-commerce
- integrações entre backend e frontend
