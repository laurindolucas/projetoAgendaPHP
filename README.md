#  Projeto Agenda de Contatos

Este projeto foi desenvolvido durante o curso de PHP na Udemy, com o objetivo de **praticar e reforçar os conhecimentos básicos de PHP** e entender na prática **como funciona a ligação com um banco de dados MySQL**.

##  Objetivo

A proposta é simples: criar uma **Agenda de Contatos** com as funcionalidades essenciais de um CRUD:

- **Create** (Criar)
- **Read** (Ler/Listar)
- **Update** (Atualizar)
- **Delete** (Deletar)

## 🛠 Tecnologias Utilizadas

- **PHP** (backend)
- **MySQL** (banco de dados)
- **HTML** (estrutura)
- **CSS** (estilização)

##  Finalidade da Documentação

Esta é uma documentação simples com o propósito de:

- Ajudar a **memorizar e revisar o conteúdo aprendido**
- Servir como **referência futura**
- Incentivar outras pessoas que estão estudando PHP a **praticar com este projeto**

##  Por que é um bom projeto para praticar?

O CRUD é uma das bases fundamentais no desenvolvimento web. Trabalhar com esse tipo de aplicação permite entender melhor:

- Como enviar e receber dados com formulários HTML
- Como usar **PDO** ou **MySQLi** para interagir com o banco
- Como organizar melhor o código PHP
- A lógica por trás de sistemas reais que lidam com dados

---

##  Organização do Projeto

O primeiro passo para um bom projeto é **organizar seus arquivos da forma correta**.  
A divisão de pastas é uma ótima aliada na sua organização — ela deixa o projeto mais limpo, compreensível e fácil de manter.

Neste projeto, adotei a seguinte estrutura:

### 📁 Pasta `config`

Responsável pela configuração principal do projeto:

- `connections.php`: faz a conexão com o banco de dados.
- `process.php`: realiza as requisições ao banco (insert, update, delete).
- `url.php`: responsável por definir e formatar URLs para facilitar a interação entre os arquivos PHP.

### 🎨 Pasta `css`

Contém os estilos da aplicação:

- `style.css`: responsável pela estilização geral.

> 💡 *Em projetos maiores ou se quiser ainda mais organização, você pode criar múltiplos arquivos CSS separando partes específicas do sistema (ex: `form.css`, `layout.css`, `header.css`), para evitar que o código fique com centenas de linhas em um único arquivo.*

### 🧩 Pasta `templates`

Contém partes reutilizáveis da interface:

- `header.php`: cabeçalho do site.
- `footer.php`: rodapé do site.
- `backctnk.html`: botão de voltar.

Utilizar `includes` de cabeçalho e rodapé é uma ótima prática para evitar repetir o mesmo código em vários arquivos e manter o padrão visual em todo o projeto.

### 📄 Arquivos soltos

Esses arquivos representam páginas distintas da aplicação, por isso não há necessidade de estarem dentro de uma pasta:

- `create.php`: página de cadastro de contato.
- `edit.php`: página de edição de contato.
- `index.php`: página principal com listagem de contatos.
- `show.php`: exibe os detalhes de um contato.

---
📦 Projeto Agenda de Contatos
├── 📁 config
│   ├── connections.php
│   ├── process.php
│   └── url.php
│
├── 📁 css
│   └── style.css
│
├── 📁 templates
│   ├── header.php
│   ├── footer.php
│   └── backctnk.php
│
├── create.php
├── edit.php
├── index.php
└── show.php
