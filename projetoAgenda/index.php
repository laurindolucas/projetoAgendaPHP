<?php
include_once("templates/header.php");
?>

    <div class="conntainer-index">
        <?php if (isset($printMsg) && $printMsg != ''): ?> 
            <p id="msg"><?= $printMsg ?></p>
        <?php endif; ?>
        <h1 id="main-title">Minha Agenda</h1>
        <?php  if(count($contatos) > 0) :?>
            <table class="table" id="contatos-table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nome</th>
                        <th scope="col">telefone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contatos as $contato): ?>
                        <tr>
                            <td scope="row"> <?= $contato["id"] ?></td>
                            <td scope="row"> <?= $contato["nome"] ?></td>
                            <td scope="row"> <?= $contato["telefone"] ?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL ?>show.php?id=<?= $contato["id"] ?>"><i class=" fas fa-eye check-icon"></i></a>
                                <a href="<?= $BASE_URL ?>edit.php?id=<?= $contato["id"] ?>"><i class=" far fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $contato["id"] ?>">
                                    <button type="submit"><i class="fas fa-times delete-icon"></i></button>
                                </form>      
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php else: ?>
            <p class="semContato">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php">Clique aqui para adicionar</a>.</p>
            <?php endif;?>
    </div>

<?php
include_once("templates/footer.php");
?>