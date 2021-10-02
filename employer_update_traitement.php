<?php
session_start();
require_once 'database.php';


if (!empty($_POST["id"]) && !empty($_POST["email"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["tel"]) && !empty($_POST["grade"] && !empty($_POST["statut"]))) {

    $ids = intval(htmlentities($_POST["id"]));
    $email = htmlentities($_POST["email"]);
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $mobile = htmlentities($_POST["tel"]);
    $grade = htmlentities($_POST["grade"]);
    $grade = intval($grade);
    $statut = htmlentities($_POST["statut"]);
    if ($statut === "actif") {
        $statut = 1;
    }
    if ($statut === "innactif") {
        $statut = 0;
    }
    if ($statut === "conge") {
        $statut = 2;
    }
    if ($statut === "vacance") {
        $statut = 3;
    }
    if ($statut === "arret_maladie") {
        $statut = 4;
    }

    if ($grade === "admin") {
        $grade = 3;
    } else {
        $grade = 1;
    }
    if (strlen($nom) <= 100) {
        if (strlen($prenom) <= 100) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($mobile) <= 10 && is_numeric($mobile)) {
                    $query = $bdd->prepare("UPDATE `users` SET email = :email, firstname = :firstname, surname = :surname, telephone = :telephone, grade = :grade, active = :active WHERE users.id = :id");
                    $query->execute(array(
                        "email" => $email,
                        "firstname" => $prenom,
                        "surname" => $nom,
                        "telephone" => $mobile,
                        "grade" => $grade,
                        "active" => $statut,
                        "id" => $ids
                    ));
                    $final = $query->fetch();
                    var_dump($ids);
//                    header("Location:liste_employer.php");
                } else {
                    header('Location:liste_employer.php?tel_err');
                }
            } else {
                header('Location:liste_employer.php?add_err=emailvalid');
            }
        } else {
            header('Location:liste_employer.php?add_err=firstname_lengt');
        }
    } else {
        header('Location:liste_employer.php?add_err=lastname_length');
    }
} else {

    header('Location:liste_employer.php?add_err=emptyfield');
}

/* ici err a faire */