<?php
require 'database.php';
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
if (!empty($_POST["couleur"])) {

    $couleur = htmlentities($_POST["couleur"]);

    if (strlen($couleur) < 100) {
        $query = $bdd->prepare('INSERT INTO couleur(libelle) VALUE (:libelle)');
        $query->execute(array(
            "libelle" => $couleur,
        ));
        header('Location:fleurs.php');
    } else header('Location:fleurs.php?add_err=strlen');
} else header('Location:fleurs.php?add_err=emptyfield');

