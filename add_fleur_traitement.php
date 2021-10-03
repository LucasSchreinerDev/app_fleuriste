<?php
require "database.php";
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
if(!empty($_POST["variete"]) && !empty($_POST["couleur"])){
  $variete = htmlentities($_POST["variete"]);
  $couleur = htmlentities($_POST["couleur"]);
  $couleur = intval($couleur);
  $variete = intval($variete);

  $query = $bdd->prepare('INSERT INTO fleur(id_couleur, id_variete) VALUES (:id_couleur, :id_variete)');
  $query->execute(array(
      "id_couleur" => $couleur,
      "id_variete" => $variete,
  ));
  header("Location:fleurs.php");
    var_dump($couleur);
}else header('Location:fleur.php?add_err=emptyflied');