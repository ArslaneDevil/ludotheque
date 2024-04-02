<?php
require_once('global/header.php');

verifConnect(1);

$typelist = $bdd->query('SELECT * FROM type');
$ltype = $typelist->fetchall();

?>

<div class="container">
    <h1>Liste des types</h1>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>action</th>
            </tr>

        </thead>
        <tbody>
            <?php
            foreach($ltype as $liste){
                ?>
                <tr>
                <td><?= $liste["id"] ?></td>
                <td><?= $liste["nom"] ?></td>
                <td><a href="type_modif.php"><button class="btn btn-primary">Modifier le type</button></a>
                <button class="btn btn-secondary"><a href="type_delete.php">Supprimer le type</a></button></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </label>
</div>