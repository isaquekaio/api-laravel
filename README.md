# desafio-api-laravel

**Desafio Api Laravel**

## Ambiente de desenvolvimento

* php:7.3
* PostgreSQL 10
* docker-compose

## Pré requisito para roda o projeto: docker e docker-compose

#### Tutorial para instalação do docker no linux

* [Tutorial oficial](https://docs.docker.com/engine/install/ubuntu/)

#### Tutorial para instalar o docker-compose no linux

* [Tutorial oficial](https://docs.docker.com/compose/install/)

## Passos para roda o projeto

### Utilizar o sistema

* Para baixar o projeto clique no botão **Code** de cor verde e em seguida clique em **Download ZIP**

* Vá na pasta Download do seu computador, clique com o botão direito sobre o arquivo **api-laravel-main** e em seguida clique na opção **extrair aqui**

* Abra o terminal e em seguida entre na pasta **api-laravel-main** com o comando `cd api-laravel-main` 

#### Para roda o projeto

* Dentro da pasta **api-laravel-main**, digite o seguinte comando:

`docker-compose up -d`

* Em seguida, no terminal digite esse comando `docker container exec -it lais-app bash` para acessa ao container do projeto

* Estando dentro do container, cole os seguintes comandos:

* `php artisan migrate --seed`

* `php artisan passport:client --personal`

#### Para usar o sistema

* Abra o seu navegador de internet e digite: 

`localhost:8000/api/`

## Documentação da API

### Módulo Gestão


### Módulo Transparência