<?php
require_once 'global/header.php';

// Demande de suppression d'un jeu
if(isset($_POST['id'])){
    $delete = $bdd->prepare('DELETE FROM jeux WHERE id_jeu = ?');
    $delete->execute([$_POST['id']]);
}

// Récupération de tous les jeux en base
$jeuxRs = $bdd->query('SELECT * FROM jeux ORDER BY nom');
$jeux = $jeuxRs->fetchAll();
?>
    <div class="container">
        <div class="row">
            <h1>Liste des jeux</h1>
            <?php
            foreach ($jeux as $jeu) {
                ?>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= $jeu['img'] ?>" style="max-width: 100%" alt="">
                        </div>
                        <div class="col-md-8">
                            <h4><?= $jeu['nom'] ?></h4>
                            <p><?= $jeu['description'] ?></p>
                            <b>Age min. :</b> <?= $jeu['age_min'] ?> ans
                            <b style="display: inline-block;margin-left: 15px">Nombre joueurs :</b> De <?= $jeu['nb_joueur_min'] ?> à  <?= $jeu['nb_joueur_max'] ?> joueurs
                            <b style="display: inline-block;margin-left: 15px">Type de jeu :</b>
                            <?php
                                // Affichage à modifier en correspondance avec la BDD + L'affichage de plusieurs types
                                switch ($jeu['type']){
                                    case '1' :
                                        echo "Deck building";
                                        break;
                                    case '2' :
                                        echo "Draft";
                                        break;
                                    case '3' :
                                        echo "Ressources";
                                        break;
                                    case '4' :
                                        echo "Cartes";
                                        break;
                                    case '5' :
                                        echo "Draw & Write";
                                        break;
                                    case '6' :
                                        echo "Ouvriers";
                                        break;
                                    case '7' :
                                        echo "Escape Game";
                                        break;
                                    default:
                                        echo 'Inconnu';
                                        break;
                                }
                            ?>
                        </div>
                        <div class="col-md-2">
                            <?php
                            // Si l'utilisateur est Administrateur alors il peut modifier ou supprimer le jeu
                            if($_SESSION['admin']){
                                ?>
                                <a class="btn btn-primary" href="jds_modif.php?id=<?= $jeu['id_jeu'] ?>">Modifier</a>
                                <form style="display: inline-block" method="post"><button class="btn btn-danger">Supprimer</button>
                                    <input type="hidden" name="id" value="<?= $jeu['id_jeu'] ?>"></form>
                                <br>
                                <?php
                            }
                            ?>
                        <!--             Ajouter un bouton pour ajouter/supprimer le jeu de sa collection               -->
                        <?php
                            if(in_array($jeu['id_jeu'],$tabjeuludo)){
                                echo "je l'ai dans ma ludo";
                            }else{
                                echo "je l'ai pas dans ma ludo";
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

<?php
require_once 'global/footer.php';

