<?php
require 'database.php';
if (!empty($_POST['stock']) && !empty($_POST['fournisseur_id']) && !empty($_POST["fleur_id"])) {
    $stock_update = htmlentities($_POST['stock']);
    $stock_update = intval($stock_update);
    $fournisseur_id = htmlentities($_POST['fournisseur_id']);
    $fournisseur_id = intval($fournisseur_id);
    $fleur_id = htmlentities($_POST['fleur_id']);
    $fleur_id = intval($fleur_id);
    /*Pour le fonctionnement php allez voir add_commande_traitement, client update.php , database.php , add_employer.php et pour le css header.php plus*/
    $update = $bdd->prepare("UPDATE fleur_fournisseur SET stock = :stock WHERE id_fournisseur = :id_fournisseur AND id_fleur = :id_fleur");
    $update->execute(array(
        "stock" => $stock_update,
        "id_fournisseur" => $fournisseur_id,
        "id_fleur" => $fleur_id,
    ));
    header('Location:fleurs.php');
}else {
    header('Location:fleurs.php?reg_err=emptyfield');
}
