<?php
require 'database.php';

if(!empty($_GET["del"])){
    $del = htmlentities($_GET['del']);
    $del = intval($del);
    /*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
    $query = $bdd->prepare(" DELETE commande FROM commande INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande WHERE num_commande =:id");
    $query->execute(array(
        "id" => $del,
    ));
    header("Location:commande.php");
}else header('Location:commande.php?del_err=emptyflied');