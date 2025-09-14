# Fluido Certo

Um sistema desenvolvido para ajudar a encontrar a recomendação de fluido de motor ideal para qualquer veículo. A aplicação conta com uma interface pública para consultas rápidas e um painel de controle administrativo para gerenciamento completo dos dados.

Este projeto foi construído passo a passo, servindo como um estudo prático e aprofundado do ecossistema Laravel, desde a configuração do ambiente até a criação de uma interface de usuário moderna e funcional em dispositivos portáteis.

---

## Demonstração em Vídeo

#### Consulta Pública e Seleção Dinâmica
O fluxo principal para um visitante: selecionar dinamicamente a montadora, modelo e ano para encontrar a recomendação de fluido.

![Demonstração da Consulta Pública](https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExdzkwbXgwdWZpeTRvMW42dHNpdjAzNmRxbm83M3JyeTN0azB0ajFsOCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/HpV1l9p5cyNp8CT7jp/giphy.gif)

<br>

#### Autenticação e Acesso ao Painel
Fluxo de login/registo de um usuário administrativo para aceder à área de gestão segura, construído com Laravel Breeze.

![Demonstração do Login](https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExbnpva2hrY2k3N2tuMHphcjFweDMwYXdrbjZhdDNtOWg4ZDhucGdleCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/bieYEj5NLriPHYTFGi/giphy.gif)

<br>

#### Gestão de Dados (CRUD) no Painel de Controle
Demonstração das funcionalidades de Criar, Ler, Editar e Excluir para montadoras, modelos e recomendações, utilizando uma interface de cards responsiva com ações via modal.

![Demonstração do Painel de Controle](https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExZm12aHVzbDlyOWxrejVtOGJnbjhycGtmcXozOG15ZndldGY1Z3FkYiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/ILdY6TsVtOrTDF3Hs8/giphy.gif)

---

## Principais Funcionalidades

* **Consulta Pública Dinâmica:** Uma interface simples onde o usuário seleciona Montadora, Modelo e Ano em menus suspensos que se atualizam dinamicamente.

* **Painel Administrativo Seguro:** Uma área de gestão protegida por autenticação (criada com Laravel Breeze), onde um administrador pode realizar operações CRUD completas.

* **Interface Responsiva:** O design foi construído com Bootstrap 5, utilizando um layout de cards que se adapta perfeitamente a qualquer tamanho de ecrã e aciona as ações via Modals para uma melhor experiência mobile.

### 🔌 Documentação e Demonstração da API

A aplicação expõe um endpoint público (`GET`) para consultar as recomendações de fluido. O GIF abaixo demonstra uma requisição de sucesso e uma de erro usando o Postman.

![Demonstração da API com Postman](https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExYXp0eWduYXhtN2s1eTQxZHhoZnA1Y2pqNzFpenJ0Y3owbjhhZmlxZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/68gKU9KqKi2RxB7fv5/giphy.gif)

**Endpoint:**
`GET /api/v1/recommendation`

**Parâmetros (Query):**

| Parâmetro    | Tipo    | Obrigatório | Exemplo                 |
| :----------- | :------ | :---------- | :---------------------- |
| `manufacturer` | string  | Sim         | `Montadora Genérica 1`  |
| `model`        | string  | Sim         | `Modelo A`              |
| `year`         | integer | Sim         | `2022`                  |

**Exemplo de Resposta de Sucesso (Status `200 OK`):**
```json
{
    "data": {
        "recommended_oil": "Óleo Tipo A"
    }
}
```

## 🛠️ Stack de Tecnologia

* **Back-end:** Laravel 11 & PHP 8.3
* **Front-end:** Bootstrap 5, Vite, JavaScript (Vanilla JS)
* **Banco de Dados:** MySQL
* **Ambiente de Desenvolvimento Local:** Laragon

---

## 🚀 Como Executar o Projeto Localmente

Para testar ou continuar o desenvolvimento, siga estes passos:

1.  **Clonar o repositório:**
    ```bash
    git clone [https://github.com/gnery7/fluido-certo.git](https://github.com/gnery7/fluido-certo.git)
    ```

2.  **Navegar para a pasta do projeto:**
    ```bash
    cd fluido-certo
    ```

3.  **Instalar dependências do back-end (PHP):**
    ```bash
    composer install
    ```

4.  **Instalar dependências do front-end (JS):**
    ```bash
    npm install
    ```

5.  **Configurar o ambiente:**
    * Copie o ficheiro de exemplo de ambiente: `copy .env.example .env`
    * Gere a chave da aplicação: `php artisan key:generate`

6.  **Configurar o banco de dados:**
    * Crie uma nova base de dados MySQL chamada `fluido_certo`.
    * Atualize as variáveis `DB_DATABASE`, `DB_USERNAME`, e `DB_PASSWORD` no seu ficheiro `.env` com as suas credenciais locais.

7.  **Estruturar e popular o banco de dados:**
    * Este comando irá criar todas as tabelas e preenchê-las com os dados de exemplo.
    ```bash
    php artisan migrate:fresh --seed
    ```

8.  **Compilar os assets de front-end:**
    ```bash
    npm run dev
    ```

9.  **Aceder à aplicação:**
    * Se estiver a usar Laragon, ele criará automaticamente uma URL. Basta aceder: `http://fluido-certo.test`
    * Alternativamente, num outro terminal, rode `php artisan serve` e aceda a `http://127.0.0.1:8000`.