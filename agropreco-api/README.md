# AgroPreço — API REST em Laravel

## Atividade Integrada: Projeto de Software

CRUD REST completo para as entidades descritas no DER/MER do projeto AgroPreço.

> **Observação acadêmica:** a atividade original pede que cada integrante faça uma entidade única. Este pacote contém todas as entidades para demonstrar o CRUD completo do projeto. Na entrega individual, confirme com o grupo qual entidade é a sua e informe os integrantes conforme solicitado pelo professor.

## Entidades implementadas

1. Usuário → `usuarios`
2. Transação → `transacoes`
3. Contrato Futuro → `contratos_futuros`
4. Boi → `bois`
5. Fazenda → `fazendas`
6. Histórico Peso → `historico_pesos`
7. Credencial → `credenciais`
8. Projeção → `projecoes`
9. Cotação → `cotacoes`

Os nomes e atributos foram baseados na descrição fornecida no DER do projeto. Quando o DER descrevia apenas o nome/tipo conceitual de um atributo, o tipo SQL foi definido de forma adequada ao uso do CRUD.

## Requisitos atendidos

- Migration para cada tabela, com `id` e `timestamps`.
- Models Eloquent.
- Controllers de API com `index`, `store`, `show`, `update` e `destroy`.
- Rotas REST em `routes/api.php` usando `Route::apiResources`.
- JSON nas respostas.
- `201 Created` no cadastro.
- `200 OK` em listagem/busca/atualização.
- `404 Not Found` quando o registro não existe.
- `204 No Content` na exclusão.
- Validação de entrada.
- Senha do Usuário armazenada com hash e ocultada nas respostas.

## Instalação

### 1. Requisitos

- PHP 8.3+
- Composer
- MySQL/MariaDB

### 2. Instalar dependências

Na pasta do projeto:

```bash
composer install
```

### 3. Configurar ambiente

```bash
cp .env.example .env
php artisan key:generate
```

No Windows PowerShell, copie o arquivo `.env.example` para `.env` manualmente se `cp` não funcionar.

Configure no `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agropreco
DB_USERNAME=root
DB_PASSWORD=
```

Crie o banco `agropreco` no MySQL/phpMyAdmin.

### 4. Migrar

```bash
php artisan migrate
```

### 5. Executar

```bash
php artisan serve
```

API base:

```text
http://127.0.0.1:8000/api
```

## Rotas

Todas as rotas abaixo recebem automaticamente o prefixo `/api` porque estão em `routes/api.php`.

| Método | Endpoint | Ação |
|---|---|---|
| GET | `/api/usuarios` | listar |
| POST | `/api/usuarios` | criar |
| GET | `/api/usuarios/{id}` | buscar |
| PUT/PATCH | `/api/usuarios/{id}` | atualizar |
| DELETE | `/api/usuarios/{id}` | excluir |
| GET | `/api/transacoes` | listar |
| POST | `/api/transacoes` | criar |
| GET | `/api/transacoes/{id}` | buscar |
| PUT/PATCH | `/api/transacoes/{id}` | atualizar |
| DELETE | `/api/transacoes/{id}` | excluir |
| GET | `/api/contratos-futuros` | listar |
| POST | `/api/contratos-futuros` | criar |
| GET | `/api/contratos-futuros/{id}` | buscar |
| PUT/PATCH | `/api/contratos-futuros/{id}` | atualizar |
| DELETE | `/api/contratos-futuros/{id}` | excluir |
| GET | `/api/bois` | listar |
| POST | `/api/bois` | criar |
| GET | `/api/bois/{id}` | buscar |
| PUT/PATCH | `/api/bois/{id}` | atualizar |
| DELETE | `/api/bois/{id}` | excluir |
| GET | `/api/fazendas` | listar |
| POST | `/api/fazendas` | criar |
| GET | `/api/fazendas/{id}` | buscar |
| PUT/PATCH | `/api/fazendas/{id}` | atualizar |
| DELETE | `/api/fazendas/{id}` | excluir |
| GET | `/api/historico-pesos` | listar |
| POST | `/api/historico-pesos` | criar |
| GET | `/api/historico-pesos/{id}` | buscar |
| PUT/PATCH | `/api/historico-pesos/{id}` | atualizar |
| DELETE | `/api/historico-pesos/{id}` | excluir |
| GET | `/api/credenciais` | listar |
| POST | `/api/credenciais` | criar |
| GET | `/api/credenciais/{id}` | buscar |
| PUT/PATCH | `/api/credenciais/{id}` | atualizar |
| DELETE | `/api/credenciais/{id}` | excluir |
| GET | `/api/projecoes` | listar |
| POST | `/api/projecoes` | criar |
| GET | `/api/projecoes/{id}` | buscar |
| PUT/PATCH | `/api/projecoes/{id}` | atualizar |
| DELETE | `/api/projecoes/{id}` | excluir |
| GET | `/api/cotacoes` | listar |
| POST | `/api/cotacoes` | criar |
| GET | `/api/cotacoes/{id}` | buscar |
| PUT/PATCH | `/api/cotacoes/{id}` | atualizar |
| DELETE | `/api/cotacoes/{id}` | excluir |

## Exemplos para Postman

### Boi — POST

```http
POST http://127.0.0.1:8000/api/bois
Accept: application/json
Content-Type: application/json
```

```json
{
  "peso_atual": 480.50,
  "idade": 3,
  "raca": "Nelore",
  "sexo": "Macho",
  "data_nascimento": "2023-05-15",
  "status": "Ativo",
  "codigo_rastreio": "BOI-000001"
}
```

### Boi — PUT

```http
PUT http://127.0.0.1:8000/api/bois/1
Accept: application/json
Content-Type: application/json
```

```json
{
  "peso_atual": 525.80,
  "status": "Disponível para venda"
}
```

### Boi — DELETE

```http
DELETE http://127.0.0.1:8000/api/bois/1
Accept: application/json
```

Resposta: `204 No Content`.

## Exemplos de JSON para as outras entidades

### Usuário

```json
{
  "nome": "João da Silva",
  "email": "joao@example.com",
  "senha": "senha123",
  "tipo_usuario": "Produtor",
  "data_cadastro": "2026-08-19"
}
```

### Transação

```json
{
  "tipo_transacao": "Venda",
  "data": "2026-08-19",
  "preco_fechado": 320.50
}
```

### Contrato Futuro

```json
{
  "data_acordo": "2026-08-19",
  "data_entrega": "2027-02-15",
  "preco_acordado": 330.00,
  "observacoes": "Entrega prevista para o primeiro trimestre."
}
```

### Fazenda

```json
{
  "nome": "Fazenda Boa Vista",
  "cidade": "Belo Horizonte",
  "estado": "MG",
  "localizacao": "Zona rural",
  "contato": "(31) 99999-9999"
}
```

### Histórico Peso

```json
{
  "data": "2026-08-19",
  "peso": 480.50
}
```

### Credencial

```json
{
  "tipo": "Registro sanitário",
  "data_emissao": "2026-01-10",
  "validade": "2027-01-10",
  "descricao": "Certificação do animal."
}
```

### Projeção

```json
{
  "preco_esperado": 340.00,
  "metodo_calculo": "Média histórica",
  "data_previsao": "2027-01-15"
}
```

### Cotação

```json
{
  "preco_arroba": 325.00,
  "fonte_cotacao": "Fonte de mercado",
  "data": "2026-08-19",
  "regiao": "Minas Gerais"
}
```

## Testar as rotas

Com o servidor ligado, execute:

```bash
php artisan route:list --path=api
```

Para cada entidade, teste `GET`, `POST`, `GET /{id}`, `PUT` e `DELETE` no Postman/Insomnia/Thunder Client.

## Entrega

O PDF do DER/MER fornecido pelo grupo deve ser anexado junto com o repositório/projeto. Este pacote inclui uma cópia do PDF em `docs/Modelagem de Banco de Dados-1.pdf`.

Não inclua `vendor/` no ZIP de entrega. O professor pode executar `composer install` para restaurar as dependências.
