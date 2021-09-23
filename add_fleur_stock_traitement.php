<?php
require "database.php";
if (!empty($_POST['variete']) && !empty($_POST['fournisseur']) && !empty($_POST['stock'])){

    $variete = htmlentities($_POST['variete']);
    $variete = intval($variete);
    $fournisseur = htmlentities($_POST['fournisseur']);
    $fournisseur = intval($fournisseur);
    $stock = htmlentities($_POST['stock']);
    $stock = intval($stock);

    if (is_int($stock)){
        $query = $bdd->prepare("INSERT INTO fleur_fournisseur(id_fleur, id_fournisseur, stock) VALUES(:id_fleur, :id_fournisseur, :stock)");
        $query->execute(array(
           "id_fleur" => $variete,
           "id_fournisseur" => $fournisseur,
           "stock" => $stock,
        ));
        header('Location:fleurs.php');
    }

    else header('Location:fleurs.php?add_err=stock');
}
else header('Location:fleurs.php?add_err=emptyfield');