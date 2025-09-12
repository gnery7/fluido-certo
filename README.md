# Fluido Certo

Um sistema desenvolvido para ajudar a encontrar a recomendação de fluido de motor ideal para qualquer veículo. A aplicação conta com uma interface pública para consultas rápidas e um painel de controle administrativo para gerenciamento completo dos dados.

Este projeto foi construído passo a passo, servindo como um estudo prático e aprofundado do ecossistema Laravel, desde a configuração do ambiente até a criação de uma interface de usuário moderna e funcional em dispositivos portateis (android, ios, steamdeck e etc..).

---

## Principais Funcionalidades

* **Consulta Pública Dinâmica:** Uma interface simples onde o usuário seleciona Montadora, Modelo e Ano em menus suspensos que se atualizam dinamicamente para revelar a recomendação de fluido correta.

* **Painel Administrativo Seguro:** Uma área de gestão protegida por autenticação (criada com Laravel Breeze), onde um administrador pode realizar operações CRUD (Criar, Ler, Editar, Excluir) para:
    * Montadoras
    * Modelos de Veículos (com relacionamento à sua Montadora)
    * Recomendações de Fluido (com relacionamento ao seu Modelo e Ano)

* **Interface Responsiva:** O design foi construído com Bootstrap 5, utilizando um layout de cards que se adapta perfeitamente a qualquer tamanho de ecrã, de desktops a telemóveis. As ações nos cards são acionadas via Modals para uma experiência de usuário mais limpa em mobile.

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
    git clone [https://github.com/gnery7/fluido-certo.git]
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

9.  **Acessar a aplicação:**
    * Se estiver a usar Laragon, ele criará automaticamente uma URL. Basta acessar: `http://fluido-certo.test`
    * Alternativamente, num outro terminal, rode `php artisan serve` e acesse `http://127.0.0.1:8000`.