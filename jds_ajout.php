<?php
require_once 'global/header.php';


if(isset($_POST['nom'])){
    // Ajout du jeu en base + import du fichier d'illustration
    $direction = 'img/upload/'.$_FILES['img']["name"];
    move_uploaded_file($_FILES['img']["tmp_name"],$direction );

    $insert = $bdd->prepare("INSERT INTO `jeux`(`nom`, `description`, `img`, `age_min`, `nb_joueur_min`, `nb_joueur_max`) VALUES (:nom, :desc, :img, :age, :min, :max)");
    $insert->execute([
        'nom' => $_POST['nom'],
        'desc' => $_POST['desc'],
        'img' => $direction,
        'age' => $_POST['age'],
        'min' => $_POST['mini'],
        'max' => $_POST['maxi'],
    ]);

    if(count($_POST['types'])){

        $id_jeu = $bdd->lastInsertId();
        foreach ($_POST['types'] as $type_id){
            $insertType = $bdd->prepare('INSERT INTO jeu_type (jeu_id,type_id) VALUES (?,?)');
            $insertType->execute([
                $id_jeu,$type_id
            ]);
        }
    }
    header('Location:jds_liste.php');die;
}

?>
<div class="container">
    <div class="row">
        <form method="post" action="" class="col-md-12" enctype="multipart/form-data">
            <h1 class="mt-3">Ajout d'un jeu</h1>
            <div class="mb-3">
                <label for="jds_nom" class="form-label">Nom du jeu</label>
                <input type="text" class="form-control" id="jds_nom" name="nom" placeholder="Dominion">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image d'illustration</label>
                <input class="form-control" type="file" id="formFile" name="img">
            </div>
            <div class="mb-3">
                <label for="jds_nom" class="form-label">Description du jeu</label>
                <textarea class="form-control" name="desc" id="jds_desc" cols="30" rows="5"></textarea>
            </div>


            <!--            Input à modifier        -->
            <div class="mb-3">
                <label for="jds_type" class="form-label">Type du jeu</label>
                <?php 
                    $typelist = $bdd->query('SELECT * FROM type');
                    $types = $typelist->fetchall();

                    $i = 0;
                    foreach($types as $type){
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $type['id'] ?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                               <?= $i.$type['nom'] ?>
                            </label>
                            </div>
                            <?php
                            $i++;
                    }
                ?>
            </div>
            <!--            /Input à modifier        -->


            <div class="mb-3">
                <label for="jds_age" class="form-label">Age Minimal</label>
                <input type="number" class="form-control" id="jds_age" name="age" placeholder="8">
            </div>
            <div class="mb-3">
                <label for="jds_min" class="form-label">Nombre de joueurs minimal</label>
                <input type="number" class="form-control" id="jds_min" name="mini" placeholder="1">
            </div>
            <div class="mb-3">
                <label for="jds_max" class="form-label">Nombre de joueurs maximal</label>
                <input type="number" class="form-control" id="jds_max" name="maxi" placeholder="8">
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</div>

<?php
require_once 'global/footer.php';

