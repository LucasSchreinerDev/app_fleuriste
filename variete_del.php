<?php
require 'database.php';

if(!empty($_POST["couleur"])){
    $couleur = htmlentities($_POST['couleur']);
    $couleur = intval($couleur);

    $query = $bdd->prepare("DELETE FROM `variete` WHERE id = :id");
    $query->execute(array(
       "id" => $couleur,
    ));
   var_dump($couleur);
    //  header("Location:add_fleur_variete.php");
}else header('Location:add_fleur_variete?del_err=emptyflied.php');