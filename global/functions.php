<?php

function verifConnect($admin = 0){
    if(isset($_SESSION['pseudo'])){
        if($admin == 1 && $_SESSION['admin'] == 0){
            header('Location: index.php');die;
        }
    }else{
        header('Location: connexion.php');die;
    }
}