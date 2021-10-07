<?php
require 'database.php';
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
if (isset($_GET['del'])) {
    $id = htmlspecialchars($_GET['del']);
    $ids = intval($id);
    $delete = $bdd->prepare("DELETE FROM `fournisseur` WHERE id=$ids");
    $delete->execute(array());
    header('Location:fournisseur.php');
}else{
    header('Location:fournisseur.php?del_err=emptyfield');
}