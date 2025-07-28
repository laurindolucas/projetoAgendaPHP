<?php

session_start();
include_once("url.php");
include_once("connections.php");

$data = $_POST;

if(!empty($data)){

    if ($data["type"] === "create") {
       $nome = $data["nome"];
       $telefone = $data["telefone"];
       $descricao = $data["descricao"];

       $q = " INSERT INTO contatos (nome, telefone, observacao) VALUES (:nome, :telefone, :descricao)";
       $stmt = $conn->prepare($q);

       $stmt->bindParam(":nome", $nome);
       $stmt->bindParam(":telefone", $telefone);
       $stmt->bindParam(":descricao", $descricao);
       
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    }elseif($data["type"] === "edit"){
        $nome = $data["nome"];
       $telefone = $data["telefone"];
       $descricao = $data["descricao"];
       $id = $data["id"];

       $q = "UPDATE contatos 
            SET nome = :nome, telefone = :telefone, observacao = :observacao
            WHERE id = :id";
               $stmt = $conn->prepare($q);

       $stmt->bindParam(":nome", $nome);
       $stmt->bindParam(":telefone", $telefone);
       $stmt->bindParam(":observacao", $descricao);
       $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    } elseif($data["type"] === "delete"){

        $id = $data["id"];
        $q = "DELETE FROM contatos WHERE id = :id";

        $stmt = $conn->prepare($q);
        $stmt->bindParam(":id", $id);
        
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    }
        header("Location:" . $BASE_URL . "../index.php");

}else {
    $id = '';
        if(!empty($_GET)){
            $id = $_GET['id'];
        }
        if(!empty($id)){
            $q = "SELECT * FROM contatos WHERE id = :id";

            $stmt = $conn->prepare($q);
            $stmt->bindParam(":id", $id);
            $stmt-> execute();
            $contato = $stmt->fetch();
        } else {
            $contatos = [];
            $q = "SELECT * FROM contatos";

            $stmt = $conn->prepare($q);
            $stmt->execute();

            $contatos = $stmt->fetchAll();
        }
}
