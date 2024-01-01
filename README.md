# Rinha-API

Esse projeto é um CRUD do Desafio [Rinha de Back-end](https://github.com/zanfranceschi/rinha-de-backend-2023-q3/blob/main/INSTRUCOES.md).

## Rodando localmente

Clone o projeto

```bash
git clone https://github.com/t-rodrigues/rinha-api.git
```

Entre no diretório do projeto

```bash
cd rinha-api
```

Instale as dependências

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Configure o banco de dados no arquivo .env

```bash
cp .env.example .env
nano .env
```

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=rinha_api
DB_USERNAME=rinha
DB_PASSWORD=senha
```

Suba o projeto via Sail usando:

```bash
./vendor/bin/sail build
./vendor/bin/sail up -d
```

Execute a migrate

```bash
./vendor/bin/sail artisan migrate
```

O servidor deve estar recebendo requisições no endereço `http://localhost`.

## Rodando os testes

Para rodar os testes, rode o seguinte comando

```bash
./vendor/bin/sail pest
```

## Stack utilizada

**Back-end:** Laravel 10, MySQL, Docker

## Autores

-   [@t-rodrigues](https://www.github.com/t-rodrigues)
