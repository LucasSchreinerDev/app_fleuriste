<?php
session_start();
require_once 'database.php';

if (!empty($_POST["id"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["telephone"]) && !empty($_POST["email"]) && !empty($_POST["adresse"]) && !empty($_POST["code_postal"]) && !empty($_POST["ville"])) {

    $ids = intval(htmlentities($_POST["id"]));
    $prenom = htmlentities($_POST["prenom"]);
    $nom = htmlentities($_POST["nom"]);
    $email = htmlentities($_POST["email"]);
    $telephone = htmlentities($_POST["telephone"]);
    $adresse = htmlentities($_POST["adresse"]);
    $ville = htmlentities($_POST["ville"]);
    $code_postal = htmlentities($_POST["code_postal"]);

    if ($grade === "admin") {
        $grade = 3;
    } else {
        $grade = 1;
    }

    $query = $bdd->prepare("UPDATE `client` SET prenom = :prenom, nom = :nom, telephone = :telephone, email = :email, adresse = :adresse, ville = :ville, code_postal = :code_postal WHERE client.id = :id");
    $query->execute(array(
        "prenom" => $prenom,
        "nom" => $nom,
        "telephone" => $telephone,
        "email" => $email,
        "adresse" => $adresse,
        "ville" => $ville,
        "code_postal" => $code_postal,
        "id" => $ids
    ));
    $final = $query->fetch();
    header("Location:client.php");
} else {
    header("Location:client.php?err_form");
}
