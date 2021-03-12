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

<table class="tg">
<thead>
  <tr>
    <th class="tg-0lax">Grupo</th>
    <th class="tg-0pky">URL</th>
    <th class="tg-0pky">Tipo</th>
    <th class="tg-0pky">Campos para o ENVIO</th>
    <th class="tg-0pky">Exemplo de Retorno JSON</th>
    <th class="tg-0lax">Descrição</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0pky" rowspan="4">Autenticação</td>
    <td class="tg-0pky">localhost:8000/api/cadastro</td>
    <td class="tg-0pky">POST</td>
    <td class="tg-0pky">"name", "email", "password","password_confirmation"</td>
    <td class="tg-0lax">{
  "user": {
    "name": "Admin",
    "email": "admin@gmail.com",
    "updated_at": "2021-03-12T11:00:35.000000Z",
    "created_at": "2021-03-12T11:00:35.000000Z",
    "id": 1
  },
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNDQwYTljMDY1NGFiYzViNmNiZTI3OGIxMDFlZTg3NjdlOTQ0MWM5ODUwNWQ1ZGE2ZWI3NTZkMDRjNmM3ZTBlZTM5ZGI2OWZiMDcxYTMxMjIiLCJpYXQiOjE2MTU1NDY4MzUsIm5iZiI6MTYxNTU0NjgzNSwiZXhwIjoxNjQ3MDgyODM1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.PJvt7GJ1nTstbsGNK9RLuMu2QDnh3PIH0o-SZykZivFFHKW24u1SRiaNjjMmgxEbJXtehA-wpgqSI12-OJ587aZsOz0Z6NDKXufTxUqRuBTn3qTwFJX72_xW6TEJP2yAXos7CR7YtaGsfAeOTbVQPLwbX6-gCy2U6c4-H3tFQR63QskMc9OyQ3UhYniUy7pXvTY8teD4g6IExSDme1Xy3JqoIXBTDlfCha8m1kBf715aPd4tmYnzyH_8UzLv_meQ6Fn9ZoGZi1WS609q7NEplYEUUUKIRNb6FfyeiDPoU1JYW1yLsVOVLCiujEoLOCBsZtaVwRbJh0tBR7IF7e2hgLX-SV2T_d2vki7S57OV74QIhwum0W83xWXCx7YSEmRpri7q28hJWA2MT-Oa8qzpoarVJsOhXm_1iap2xufY5BhoCmb6fb0HrmrMndMCQxVr77jKsAU2CXicODtQIUZ3wcs7kgVkLUSoADI_KZ5ARH2NbjzYmz-JDpMJcHvaXVAv1q09QvXhny0TzsBPzgWRZC5Pf0SagPg_2orkVMJ-SEuYHG-TuPWWPFGlf7zi_rjv0h5WyETu5BIXz8Kf1UA2HkhMUvu8n2eE68A58AvSJG4HF214PNQMN2rreurYSX0oMbatwA_PkJLnWw-_tv7XjHrxmeAAF9H0F3akexp2TIk"
  }</td>
    <td class="tg-0lax">Cadastro do usuário e o retorno dos seus dados junto com o token</td>
  </tr>
  <tr>
    <td class="tg-0pky" rowspan="4"></td>
    <td class="tg-0pky">localhost:8000/api/acesso</td>
    <td class="tg-0pky">POST</td>
    <td class="tg-0pky">"email", "password"</td>
    <td class="tg-0lax">{
  "user": {
    "id": 1,
    "name": "Admin",
    "email": "admin@gmail.com",
    "email_verified_at": null,
    "created_at": "2021-03-12T11:00:35.000000Z",
    "updated_at": "2021-03-12T11:00:35.000000Z"
  },
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiODJlYjliNTU0MDFkODYzMTcyNmY5ZDUzNGRmZDMxZWE5NTc1NzA1OTVjMjNmZDI2M2JmNDJlMzBkM2NiZmRlMjdhZTEzNDA0ODA1NDA2YjciLCJpYXQiOjE2MTU1NDY4NzgsIm5iZiI6MTYxNTU0Njg3OCwiZXhwIjoxNjQ3MDgyODc4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.VpIKm4o4Ax39c1UqW7_yfDi3Ey-N2WFB7BHVVepmZGwgjJiKfolPvqaH39QZ96u9nWHUNoSHgkNahmaHLJZCURYxX0WgJQNlUDa_WGpfZOGcWADRylH0wZ5ATgRi6JUJUJ25-agFYwUrENTIRY6oRhMTah5I9k_ULBpoffRpI3Z4YGK5RSfIp3dJejfXpT7Us7bq-Xc3UjkHxkMLLgr7z_G1uiUlTz9SIsijsVTwai0Clj7bg8W2kTdn4AFE4DWbkG-5UDx6cMUXLT7_Vj-Glzf05pOQDctgJyOwDS2fdNaAuOpCyR0hXcMkiHLmjoZQ68ZwkpvfaG3NP0O2w8Wikn9__jSqAOKKihNC97vx9bz1yDBHTsIKNU-RxdPrUT9PKo8XA_EOslbkiyS-hmBWHkvMvyO0-FoG5udHY9EGsSoJatHdd5FDhhNUnrPdAV-oF7-hmjw90G7n5li0cD28f6uMr0lUZWIAbAFQAnVNXOTqtphYEg1im7ESnpNlIUsy62nwwBCqRsEQBSt9pMn7ESx8pXLFammuBccX9vMi7Ds9xFaCOzvbV6SRjU1ABFpKvbsIN0WS6WEeVQ5W9JdQR4QpJCNBIQSrpqIa7OHPtVAQKbdkXnKd2MpxQGDHIjZfa1Dn1swP4F3a9lTU1VoZE9yhJ16Y2i7UE1SYNvnIlsI"
   }</td>
    <td class="tg-0lax">Login do usuário no sistema e o retorno é o seus dados junto com o token</td>
  </tr>
</tbody>
</table>

### Módulo Transparência