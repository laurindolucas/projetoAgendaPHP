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
##  Estrutura final do projeto

```
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
```

# Explicando passo a passo como foi feito

---

### 1. Criar o banco de dados

Primeiro, você cria um banco de dados. Eu usei o MySQL, mas como estamos usando PDO, você pode escolher outro tipo de banco de dados. Eu fiz o MySQL por já conhecer e ter familiaridade.

```sql
CREATE DATABASE agenda; -- crio o banco de dados
USE agenda; -- digo que estou usando ele

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    telefone VARCHAR(100),
    observacao VARCHAR(200)
); -- faço a criação da tabela com suas colunas



   ```
### 2. Ligação com o banco de dados

No PHP, criamos variáveis com os valores do host, nome do banco, usuário e senha (caso tenha; senão deixe as aspas em branco).

Aqui usamos o PDO para fazer a conexão. Se tudo der certo, ele entra no `try`, caso dê erro, o `catch` é chamado e mostra qual foi o erro.

```php
<?php
// Variáveis com os dados do banco de dados
$host = "hostname";
$dbname = "databasename";
$user = "username";
$pass = "passwordDatabase";

try {
    // Criando a conexão PDO com o MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Configurando para mostrar erros do PDO com exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    $error = $e->getMessage();
    echo "Erro: $error";
}
```


### 3. Formatação de URL

No PHP, a gente precisa formatar a URL caso queira fazer interações entre arquivos. Não é tão simples quanto no HTML, que é algo como `pasta/nomedoArquivo`. No PHP, precisamos fazer um tratamento, e ele é bem simples:

```php
<?php

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';
```
Fazendo isso, você consegue fazer interações entre arquivos corretamente

### 4. Criação do Header

A estrutura do PHP é o HTML, já que é uma aplicação web, então usamos muito as tags e todas as coisas.

```php
<?php
// Faço a importação do arquivo de URL para poder usar o BASE_URL
// e também o de process para fazer a interação com o banco de dados
include_once("config/url.php");
include_once("config/process.php");

// Verifico se existe uma mensagem de sessão para exibir e limpo ela depois
if (isset($_SESSION['msg'])) {
    $printMsg = $_SESSION['msg'];
    $_SESSION['msg'] = '';
}
?>
```
Crio toda a estrutura base do HTML, colocando os links de bibliotecas necessárias. Até aqui é tudo padrão:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>

    <!-- Bootstrap Reboot -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.7/css/bootstrap-reboot.min.css" integrity="sha512-jk0jBZf+2M/6V/Nql7QBoEB3bl+J9apM4VxB+UFTYTgxlO8Wxzb6nroBv+cXyXRjTHEY/HUZUynWqz1aY1/upQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <nav class="nav-bar">
                <div class="nav-links">
                    <a class="nav-link" id="home-link" href="<?= $BASE_URL ?>index.php">home</a>
                    <!-- A grande diferença daqui é exatamente a URL, a forma de interagir entre arquivos.
                         Sempre primeiro vem o comando PHP <?= $BASE_URL ?> e depois o caminho que será seguido -->
                    <a class="nav-link" id="home-link" href="<?= $BASE_URL ?>create.php">adicionar contato</a>
                </div>
            </nav>
        </header>
```
Criamos o header e sua navbar, mas deixamos o body aberto, pois ele só será fechado no footer. Assim, conseguimos criar o escopo de todo o site em diferentes arquivos.



