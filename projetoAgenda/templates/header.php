<?php
include_once("config/url.php");
include_once("config/process.php");

if (isset($_SESSION['msg'])) {
    $printMsg = $_SESSION['msg'];
    $_SESSION['msg'] = '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.7/css/bootstrap-reboot.min.css" integrity="sha512-jk0jBZf+2M/6V/Nql7QBoEB3bl+J9apM4VxB+UFTYTgxlO8Wxzb6nroBv+cXyXRjTHEY/HUZUynWqz1aY1/upQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <nav class="nav-bar">
                <div class="nav-links">
                    <a class="nav-link" id="home-link" href="<?= $BASE_URL ?>index.php">home</a>
                    <a class="nav-link" id="home-link" href="<?= $BASE_URL ?>create.php"> adicionar contato</a>
                </div>
            </nav>
        </header>

