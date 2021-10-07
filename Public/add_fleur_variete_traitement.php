<?php
require 'database.php';

if(!empty($_POST["varieter"]) && (!empty($_POST["prix"]))){
    /*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
    $varieter = htmlentities($_POST["varieter"]);
    $prix = htmlentities(intval($_POST["prix"]));

    if (strlen($varieter) < 100) {
        $query = $bdd->prepare('INSERT INTO variete(libelle, prix) VALUE (:libelle, :prix)');
        $query->execute(array(
          "libelle" => $varieter,
          "prix"=> $prix,
        ));
        header('Location:fleurs.php');
    }else header('Location:fleurs.php?add_err=strlen');
}else header('Location:fleurs.php?add_err=emptyfield');