<?php
session_start();
require_once 'database.php';

if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["addresse"]) && !empty($_POST["code_postal"]) && !empty($_POST["ville"])) {

//    $ids = intval(htmlentities($_POST["id"]));
//    $email = htmlentities($_POST["email"]);
//    $nom = htmlentities($_POST["nom"]);
//    $prenom = htmlentities($_POST["prenom"]);
//    $mobile = htmlentities($_POST["tel"]);
//    $grade = intval(htmlentities($_POST["grade"]));
//
//        $query = $bdd->prepare("UPDATE `users` SET email = :email, firstname = :firstname, surname = :surname, telephone = :telephone, grade = :grade WHERE users.id = :ids");
//        $query->execute(array(
//            "email" => $email,
//            "firstname" => $prenom,
//            "surname" => $nom,
//            "telephone" => $mobile,
//            "grade" => $grade,
//            "id" => $ids
//        ));
//        $final = $query->fetch();
//        echo "gg";
//        var_dump($ids);
 }else echo "noob";
