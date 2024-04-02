<?php
require_once 'global/header.php';

$message = "";
if(isset($_POST['prenom'])){
    $insert = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, pseudo, `mot_de_passe`) VALUES(:nom, :prenom, :pseudo, :mdp)');
    $insert->execute([
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'pseudo' => $_POST['pseudo'],
            'mdp' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ]);
    header('Location:connexion.php?message=inscriptionOk');die;
}
?>

        <div class="row">
            <div class="col-md-4 offset-md-4 text-center my-connexion">
                <h1>Inscription</h1>
                <?php
                /*if($message) {
                    */?><!--
                    <div class="alert alert-warning" role="alert">
                        <?/*= $message */?>
                    </div>
                    --><?php
/*                }*/
                ?>
                <div class="row">
                    <form class="col-md-12" method="post">
                        <div class="form-group">
                            <input type="text" required class="form-control" placeholder="Prénom" name="prenom" value="<?php if($message !== ""){echo $_POST['prenom'];} ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" placeholder="Nom" name="nom" value="<?php if($message !== ""){echo $_POST['nom'];} ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" placeholder="Pseudo" name="pseudo" value="<?php if($message !== ""){echo $_POST['pseudo'];} ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" required class="form-control" placeholder="Mot de passe" name="password" value="<?php if($message !== ""){echo $_POST['password'];} ?>">
                        </div>
                        <div>
                            <a href="connexion.php">Vous avez déjà un compte ? Connectez-vous !!!</a>
                        </div>

                        <input type="submit" value="Inscription" class="btn btn-primary form-control">
                    </form>
                </div>
            </div>

        </div>




<?php
require_once 'global/footer.php';