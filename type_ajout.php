<?php
require_once('global/header.php');

verifConnect(1);

if(isset($_POST['nom'])){
    $insertype = $bdd->prepare('INSERT INTO type (nom) VALUES (:nom)');
    $insertype->execute([
        "nom" => $_POST['nom'],
    ]);
}
?>
<div class="container">
    <form action="" method="POST">
        <h1 class="mb-1">Ajout d'un type</h1>
        <div class="mb-3">
            <label class="form-label">Nom du type</label>
            <input type="text" name="nom" id="nom" class="form-control"  placeholder="draft">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>
<?php
require_once('global/footer.php');