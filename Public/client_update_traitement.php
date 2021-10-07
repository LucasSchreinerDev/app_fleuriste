<?php
require_once 'database.php';

if (!empty($_POST["id"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["telephone"]) && !empty($_POST["email"]) && !empty($_POST["adresse"]) && !empty($_POST["code_postal"]) && !empty($_POST["ville"])) {

    $ids = htmlentities($_POST["id"]);
    $ids = intval($ids);
    $prenom = htmlentities($_POST["prenom"]);
    $nom = htmlentities($_POST["nom"]);
    $email = htmlentities($_POST["email"]);
    $telephone = htmlentities($_POST["telephone"]);
    $adresse = htmlentities($_POST["adresse"]);
    $ville = htmlentities($_POST["ville"]);
    $code_postal = htmlentities($_POST["code_postal"]);
    /*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
        if (strlen($prenom) <= 50) {
            if (strlen($nom) <= 50) {
                if (strlen($telephone) <= 10 && is_numeric($telephone)) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if (strlen($ville) < 100) {
                            if (is_numeric($code_postal)) {
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
                            }else{
                                header('Location:client.php?add_err=cp_numeric');
                            }
                        }else {
                            header('Location:client.php?add_err=city_lenght');
                        }
                    } else {
                        header('Location:client.php?add_err=mail');
                    }
                } else {
                    header('Location:client.php?add_err=phone_numeric');
                }
            } else {
                header('Location:client.php?add_err=lastname_lenght');
        }
        } else {
            header('Location:client.php?add_err=firstname_lenght');
        }
    }
 else {
    header('Location:client.php?add_err=emptyfield');
}
