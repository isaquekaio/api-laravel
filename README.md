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
        <td class="tg-0pky" rowspan="2">Autenticação</td>
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
      "access_token": "eyJ0eXAiOiJKV1QiLC ..."
      }</td>
        <td class="tg-0lax">Cadastrando do usuário</td>
    </tr>
    <tr>
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
      "access_token": "eyJ0eXAiOiJKV1QiLCJh..."
       }</td>
        <td class="tg-0lax">Login do usuário no sistema</td>
    </tr>
    <tr>
        <td class="tg-0pky" rowspan="3">Doenças</td>
        <td class="tg-0pky">localhost:8000/api/doencas</td>
        <td class="tg-0pky">GET</td>
        <td class="tg-0pky"> - </td>
        <td class="tg-0pky">{
          "doencas": [
            {
              "id": 1,
              "nome": "Anemia de Fanconi"
            },
            {
              "id": 2,
              "nome": "Anomalia de Ebstein"
            },
            {
              "id": 3,
              "nome": "Arterite de Takayasu"
        }, ... </td>
        <td class="tg-0pky">Listar doenças</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/doencas</td>
        <td class="tg-0pky">POST</td>
        <td class="tg-0pky">"nome"</td>
        <td class="tg-0pky">{
            "message": "Doença cadastrado!"
        }</td>
        <td class="tg-0pky">Cadastrando doença</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/doencas/{id}</td>
        <td class="tg-0pky">PUT</td>
        <td class="tg-0pky">"nome"</td>
        <td class="tg-0pky">{
            "message": "Atualização feita com sucesso!"
        }</td>
        <td class="tg-0pky">Atualização dados de uma doença</td>
    </tr>
    <tr>
        <td class="tg-0pky" rowspan="5">Pacientes</td>
        <td class="tg-0pky">localhost:8000/api/pacientes</td>
        <td class="tg-0pky">GET</td>
        <td class="tg-0pky"> - </td>
        <td class="tg-0pky">{
          "pacientes": [
            {
              "id": 1,
              "nome": "Pedro da Silva",
              "data_nascimento": "2002-01-01",
              "sus": "111112288233333",
              "uf_id": 11,
              "municipio_id": 110001,
              "sexo_id": 1,
              "doencas": []
            }
          ]
        }</td>
        <td class="tg-0pky">Listar os pacientes</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/pacientes</td>
        <td class="tg-0pky">POST</td>
        <td class="tg-0pky">"nome", "data_nascimento", "sus", "sexo_id", "uf_id","municipio_id"</td>
        <td class="tg-0pky">{
            "message": "Paciente cadastrado com sucesso!"
        }</td>
        <td class="tg-0pky">Cadastrando paciente</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/pacientes/{id}</td>
        <td class="tg-0pky">PUT</td>
        <td class="tg-0pky">"nome", "data_nascimento", "sus", "sexo_id", "uf_id","municipio_id"</td>
        <td class="tg-0pky">{
            "message": "Paciente Atualizado com sucesso!"
        }</td>
        <td class="tg-0pky">Atualizar os dados do paciente</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/pacientes/{id}/doenca</td>
        <td class="tg-0pky">POST</td>
        <td class="tg-0pky">"doencas"[]</td>
        <td class="tg-0pky">{
            "message": "Doenças associada ao paciente"
        }</td>
        <td class="tg-0pky">Associar doenças ao paciente</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/pacientes/{id}/desassociar_doenca</td>
        <td class="tg-0pky">POST</td>
        <td class="tg-0pky">"doencas"[]</td>
        <td class="tg-0pky">{
            "message": "Doenças desassociada do paciente."
        }</td>
        <td class="tg-0pky">Desassociar doenças ao paciente</td>
    </tr>
    <tr>
        <td class="tg-0pky" rowspan="3">Pesquisadores</td>
        <td class="tg-0pky">localhost:8000/api/pesquisadores</td>
        <td class="tg-0pky">GET</td>
        <td class="tg-0pky"> - </td>
        <td class="tg-0pky">{
          "pesquisadores": [
            {
              "id": 1,
              "nome": "João Guilherme Moura",
              "cpf": "11122233344",
              "data_nascimento": "2004-01-01",
              "uf_id": 11,
              "municipio_id": 110001,
              "sexo_id": 1
            }
          ]
        }</td>
        <td class="tg-0pky">Listas os pesquisadores</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/pesquisadores</td>
        <td class="tg-0pky">POST</td>
        <td class="tg-0pky">"nome","data_nascimento","cpf","sexo_id","uf_id",
	"municipio_id"</td>
        <td class="tg-0pky">{
            "message": "Pesquisador cadastrado com sucesso!"
        }</td>
        <td class="tg-0pky">Cadastrando Pesquisador</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/pesquisadores/{id}</td>
        <td class="tg-0pky">PUT</td>
        <td class="tg-0pky">"nome","data_nascimento","cpf","sexo_id","uf_id",
	"municipio_id"</td>
        <td class="tg-0pky">{
            "message": "Pesquisador cadastrado com sucesso!"
        }</td>
        <td class="tg-0pky">Atualizando dados do Pesquisador</td>
    </tr>
    <tr>
        <td class="tg-0pky" rowspan="2">UF</td>
        <td class="tg-0pky">localhost:8000/api/localidade/uf</td>
        <td class="tg-0pky">POST</td>
        <td class="tg-0pky">"nome","sigla"</td>
        <td class="tg-0pky">{
          "message": "Uf cadastrado com sucesso!"
        }</td>
        <td class="tg-0pky">Cadastrar UF</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/localidade/uf/{id}</td>
        <td class="tg-0pky">PUT</td>
        <td class="tg-0pky">"nome","sigla"</td>
        <td class="tg-0pky">{
          "message": "Uf atualizada com sucesso!"
        }</td>
        <td class="tg-0pky">Atualizar UF</td>
    </tr>
    <tr>
        <td class="tg-0pky" rowspan="2">Municipios</td>
        <td class="tg-0pky">localhost:8000/api/localidade/municipio</td>
        <td class="tg-0pky">POST</td>
        <td class="tg-0pky">"nome","uf_id"</td>
        <td class="tg-0pky">{
          "message": "Municipio cadastrado com sucesso!"
        }</td>
        <td class="tg-0pky">Cadastrando Municipio</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/localidade/municipio/{id}</td>
        <td class="tg-0pky">PUT</td>
        <td class="tg-0pky">"nome","uf_id"</td>
        <td class="tg-0pky">{
          "message": "Municipio atualizada com sucesso!"
        }</td>
        <td class="tg-0pky">Atualizar Municipio</td>
    </tr>
</tbody>
</table>

### Módulo Transparência

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
        <td class="tg-0pky" rowspan="3">Busca</td>
        <td class="tg-0pky">localhost:8000/api/localidade/{id}</td>
        <td class="tg-0pky">GET</td>
        <td class="tg-0pky"> - </td>
        <td class="tg-0pky">{
          "municipios": [
            {
              "id": 11,
              "nome": "Rondônia",
              "sigla": "RO",
              "municipios": [
                {
                  "id": 110001,
                  "nome": "Alta Floresta D'Oeste",
                  "uf_id": 11
                },
                {
                  "id": 110037,
                  "nome": "Alto Alegre dos Parecis",
                  "uf_id": 11
                }, ...
        </td>
        <td class="tg-0pky">Lista UF ou exibir uma UF e seus Municipios</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/listar</td>
        <td class="tg-0pky">GET</td>
        <td class="tg-0pky"> - </td>
        <td class="tg-0pky"> "sexos": [
        {
          "id": 1,
          "nome": "M"
        },
        {
          "id": 2,
          "nome": "F"
        }
      ],
      "faixa": [
        {
          "1": "00-18",
          "2": "19-25",
          "3": "26-35",
          "4": "36-50",
          "5": "51-60",
          "6": "60-70",
          "7": "70-80",
          "8": "80-100"
        }
      ]</td>
        <td class="tg-0pky">Lista dados que serião apresentado dentro de um select (doenças, sexos, faixas)</td>
    </tr>
    <tr>
        <td class="tg-0pky">localhost:8000/api/filtro</td>
        <td class="tg-0pky">GET</td>
        <td class="tg-0pky">"doenca_id", "uf_id", "municipio_id", "sexo_id", "faixa"</td>
        <td class="tg-0pky">{
          "pacientes_qtd": 1
        }</td>
        <td class="tg-0pky">Listar a quantidade de parciete baseado no filtro</td>
    </tr>
<tbody>
</table>
