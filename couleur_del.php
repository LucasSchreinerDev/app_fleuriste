<?php
require 'database.php';
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
if(!empty($_POST["couleur"])){
    $couleur = htmlentities($_POST['couleur']);
    $couleur = intval($couleur);

    $query = $bdd->prepare("DELETE FROM `couleur` WHERE id = :id");
    $query->execute(array(
        "id" => $couleur,
    ));
    header("Location:add_fleur_couleur.php");
}else header('Location:add_fleur_couleur.php?del_err=emptyflied');