
<?php
include_once("templates/header.php");
?>

<?php include_once("templates/backbtn.html"); ?>
<h1 class="criar-title">Editar contato</h1>
<div class="container-criar">
    <form action="<?= $BASE_URL ?>config/process.php" method="POST" class="form-criar">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contato['id'] ?>">
        <div class="form-group">
            <label for="name">Nome do contato:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Lucas..." value="<?= $contato['nome'] ?>" required>
        </div>
        <div class="form-group">
            <label for="name">Telefone do contato:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Ex: (81)98282-7272..." value="<?= $contato['telefone'] ?>" required>
        </div>
        <div class="form-group">
            <label for="name">Descrição do contato:</label>
            <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Ex: Contato do médico..." row="3"><?= $contato['observacao'] ?></textarea>
        </div>
        <button type="submit" class="btn-primary">Cadastrar</button>
    </form>
</div>


<?php
include_once("templates/footer.php");
?>