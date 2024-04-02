<?php
    session_start();

    require_once 'global/functions.php';
    require_once 'global/bdd.php';

    try{
        // Connexion en BDD
        $bdd = new PDO("mysql:host=$bdd_host:$bdd_port;dbname=$bdd_nom_base;charset=utf8", $bdd_user, $bdd_password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/base.css">
</head>
<body id="<?= str_replace('.php','',pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME))?>">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">BoardGames</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jeux de société
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="jds_liste.php">Liste des jeux</a></li>
                        <li><a class="dropdown-item" href="jds_ajout.php">Ajouter une jeu</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Type
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="type_ajout.php">Ajouter un type</a></li>
                        <li><a class="dropdown-item" href="type_list.php">Liste des types</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right">
            <?php
            if(isset($_SESSION["prenom"]) && !empty($_SESSION['prenom'])){
                ?>
                Bonjour <?= $_SESSION["prenom"].' '.$_SESSION["nom"]; ?> - <a href="deconnexion.php">Déconnexion</a>
                <?php
            }else{
                ?>
                <a href="connexion.php">Se Connecter</a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>