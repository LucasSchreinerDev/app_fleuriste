<?php
require 'database.php';
/*Pour le fonctionnement php allez voir add_commande_traitement, client update.php , database.php , add_employer.php et pour le css header.php plus*/
if(!empty($_POST["variete"])){
    $variete = htmlentities($_POST['variete']);
    $variete = intval($variete);

    $query = $bdd->prepare("DELETE FROM `variete` WHERE id = :id");
    $query->execute(array(
       "id" => $variete,
    ));
      header("Location:add_fleur_variete.php");
}else header('Location:add_fleur_variete.php?del_err=emptyflied');