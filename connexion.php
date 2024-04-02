<?php
require_once 'global/header.php';

$message = "";
if(isset($_GET['message']) && $_GET['message'] == "inscriptionOk"){
    $message = [
        'type' => "success",
        'msg' => "L'inscription a été validée",
    ];
}
if(isset($_POST['pseudo'])){
    $connexionRs = $bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
    $connexionRs->execute(['pseudo' => $_POST['pseudo']]);
    $users = $connexionRs->fetchAll();

    foreach ($users as $user){
        if(password_verify($_POST['password'], $user['mot_de_passe'])){
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['admin'] = $user['admin'];
            header('Location:index.php');die;
        }
    }
    $message = [
        'type' => "danger",
        'msg' => "Erreur lors de la connexion, veuillez retenter",
    ];

}
?>


    <div class="row">
        <div class="col-md-4 offset-md-4 text-center my-connexion">
            <h1>Connexion</h1>
            <?php 
            if($message != "") {
                ?>
                <div class="alert alert-<?= $message['type'] ?>" role="alert">
                    <?= $message['msg'] ?>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <form class="col-md-12" method="post" action="connexion.php">
                    <div class="form-group">
                        <input type="text" required class="form-control" placeholder="Pseudo" name="pseudo" value="<?php if(isset($_POST['pseudo']) && $message !== ""){echo $_POST['pseudo'];} ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" required class="form-control" placeholder="Mot de passe" name="password" value="<?php if(isset($_POST['pseudo']) && $message !== ""){echo $_POST['password'];} ?>">
                    </div>
                    <div>
                        <a href="connexion.php">Vous n'avez pas de compte ? Inscrivez-vous !!!</a>
                    </div>

                    <input type="submit" value="Connexion" class="btn btn-primary form-control">
                </form>
            </div>
        </div>

    </div>


<?php
require_once 'global/footer.php';