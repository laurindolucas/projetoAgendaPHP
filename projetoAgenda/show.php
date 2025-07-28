<?php
include_once("templates/header.php");
?>
<?php include_once("templates/backbtn.html"); ?>
<div class="conatiner-view" id="view-conatiner-contact">

    <h1 id="main-title-view"><?= $contato["nome"] ?></h1>
        <div class="infos">
            <div class="info-telefone">
                <P>Telefone:</P>
                <p><?= $contato["telefone"] ?></p>
            </div>
            <div class="info-descricao">
                <P>Observações:</P>
                <p><?= $contato["observacao"] ?></p>
            </div>
        </div>
</div>


<?php
include_once("templates/footer.php");
?>