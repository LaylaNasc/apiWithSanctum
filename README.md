<h1 align="center">API COM SANCTUM</h1>

## SOBRE

Este projeto é uma API RESTful desenvolvida em Laravel para autenticação de usuários e gerenciamento de clientes. Ela utiliza Laravel Sanctum para autenticação de tokens e segue boas práticas de estruturação de código e respostas padronizadas.

## Funcionalidades

### 1. Autenticação do Usuário:

- Login e geração de tokens de acesso.
- Logout e revogação de tokens

### 2. Gerenciamentos de Clientes:

- Listagem de todos os clientes.
- Criação de novos clientes.
- Consulta de clientes por ID.
- Atualização de dados de clientes.
- Exclusão de clientes.

### 3. Respostas Padronizadas: 

- Todas as respostas seguem um padrão definido pela classe ApiResponse para facilitar a integração com frontends.

##  Tecnologias Utilizadas

- Laravel: Framework do PHP.
- Sanctum
- Factory e Seeder: Para gerar e popular o banco de dados com dados fictícios.
- Banco de Dados:MySQL.
- Faker: Para gerar dados fictícios.
- Postman: Para testar as rotas.

 ## Endpoints

| Método   | Endpoint              | Descrição                                       | Autenticação |
|----------|-----------------------|-------------------------------------------------|--------------|
| `GET`    | `/status`             | Verifica se a API está funcionando              | ✅           |
| `POST`   | `/login`              | Realiza login e retorna o token de autenticação | ❌           |
| `POST`   | `/logout`             | Realiza logout e invalida o token               | ✅           |
| `GET`    | `/clients`            | Retorna todos os clientes                       | ✅           |
| `POST`   | `/clients`            | Cria um novo cliente                            | ✅           |
| `GET`    | `/clients/{id}`       | Retorna as informações de um cliente específico | ✅           |
| `PUT`    | `/clients/{id}`       | Atualiza os dados de um cliente específico      | ✅           |
| `DELETE` | `/clients/{id}`       | Deleta um cliente específico                    | ✅           |

 ## Licença

Este projeto está licenciado sob os termos da MIT License.