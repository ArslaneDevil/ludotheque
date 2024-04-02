<?php
require_once 'global/header.php';

if(isset($_POST['nom'])){
    // S'il y a un fichier, modifier toutes les données + importer le fichier
    if($_FILES['img']['name'] != ""){
        $direction = 'img/upload/'.$_FILES['img']["name"];
        move_uploaded_file($_FILES['img']["tmp_name"],$direction );
        $update = $bdd->prepare("UPDATE `jeux` SET `nom`=:nom,`description`=:desc,`img`=:img,`type`=:type,`age_min`=:age,`nb_joueur_min`=:min,`nb_joueur_max`=:max WHERE `id_jeu`= :id");
        $update->execute([
            'nom' => $_POST['nom'],
            'desc' => $_POST['desc'],
            'img' => $direction,
            'type' => $_POST['type'],
            'age' => $_POST['age'],
            'min' => $_POST['mini'],
            'max' => $_POST['maxi'],
            'id' => $_GET['id'],
        ]);
    }else{
        // Sinon, mettre à jour les valeurs en BDD
        $update = $bdd->prepare("UPDATE `jeux` SET `nom`=:nom,`description`=:desc,`type`=:type,`age_min`=:age,`nb_joueur_min`=:min,`nb_joueur_max`=:max WHERE `id_jeu`= :id");
        $update->execute([
            'nom' => $_POST['nom'],
            'desc' => $_POST['desc'],
            'type' => $_POST['type'],
            'age' => $_POST['age'],
            'min' => $_POST['mini'],
            'max' => $_POST['maxi'],
            'id' => $_GET['id'],
        ]);
    }
    header('Location:jds_liste.php');die;
}

if(!isset($_GET['id'])){
    header('Location:jds_liste.php');die;
}
$jeuRs = $bdd->prepare('SELECT * FROM jeux WHERE id_jeu = ?');
$jeuRs->execute([$_GET['id']]);

$jeu = $jeuRs->fetch();

?>
    <div class="container">
        <div class="row">
            <form method="post" action="" class="col-md-12" enctype="multipart/form-data">
                <h1 class="mt-3">Modification d'un jeu</h1>
                <div class="mb-3">
                    <label for="jds_nom" class="form-label">Nom du jeu</label>
                    <input type="text" class="form-control" id="jds_nom" name="nom" placeholder="Dominion" value="<?= $jeu['nom'] ?>">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image d'illustration (ne sera pas modifiée si rien n'est renseigné)</label>
                    <input class="form-control" type="file" id="formFile" name="img">

                    <em>Image actuelle :</em>
                    <img src="<?= $jeu['img'] ?>" width="100px" alt="">
                </div>
                <div class="mb-3">
                    <label for="jds_nom" class="form-label">Description du jeu</label>
                    <textarea class="form-control" name="desc" id="jds_desc" cols="30" rows="5"><?= $jeu['description'] ?></textarea>
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
                            <input class="form-check-input" type="checkbox" role="switch" value="<?= $type['id'] ?>" id="flexCheckDefault_<?= $i ?>">
                            <label class="form-check-label" for="flexCheckDefault_<?= $i ?>">
                               <?= $type['nom'] ?>
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
                    <input type="number" class="form-control" id="jds_age" name="age" placeholder="8" value="<?= $jeu['age_min'] ?>">
                </div>
                <div class="mb-3">
                    <label for="jds_min" class="form-label">Nombre de joueurs minimal</label>
                    <input type="number" class="form-control" id="jds_min" name="mini" placeholder="1" value="<?= $jeu['nb_joueur_min'] ?>">
                </div>
                <div class="mb-3">
                    <label for="jds_max" class="form-label">Nombre de joueurs maximal</label>
                    <input type="number" class="form-control" id="jds_max" name="maxi" placeholder="8" value="<?= $jeu['nb_joueur_max'] ?>">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>

<?php
require_once 'global/footer.php';

