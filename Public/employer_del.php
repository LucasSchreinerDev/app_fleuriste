<?php
require "database.php";
if (!empty($_GET['del'])){
    $id = htmlentities($_GET['del']);
    $id = intval($id);

    $query = $bdd->prepare("DELETE FROM `users` WHERE id = :id");
    $query->execute(array(
        "id" => $id,
    ));
    header('Location:liste_employer.php?succes');
    /*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
}else header('Location:liste_employer.php?del_err=wrongfield');