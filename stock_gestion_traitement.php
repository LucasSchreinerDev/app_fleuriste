<?php
require 'database.php';
if (!empty($_POST['stock']) && !empty($_POST['fournisseur_id'])) {
    $stock_update = htmlentities($_POST['stock']);
    $stock_update = intval($stock_update);
    $fournisseur_id = htmlentities($_POST['fournisseur_id']);
    $fournisseur_id = intval($fournisseur_id);

    $update = $bdd->prepare("UPDATE fleur_fournisseur SET stock = :stock WHERE id_fournisseur = :id_fournisseur");
    $update->execute(array(
        "stock" => $stock_update,
        "id_fournisseur" => $fournisseur_id,
    ));
    header('Location:fleurs.php');
}else {
    header('Location:fleurs.php?reg_err=emptyfield');
}
