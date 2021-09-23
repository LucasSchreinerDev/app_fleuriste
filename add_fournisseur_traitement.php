<?php
require 'database.php';

if (!empty($_POST["raison_soc"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["tel"])) {

    $raison_soc = htmlentities($_POST['raison_soc']);
    $prenom = htmlentities($_POST['prenom']);
    $nom = htmlentities($_POST['nom']);
    $tel = htmlentities($_POST['tel']);

    $check = $bdd->prepare('SELECT * FROM fournisseur where raison_soc = :raison_soc');
    $check->execute(array(
        'raison_soc' => $raison_soc,
    ));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 0) {
        if (strlen($raison_soc) <= 100) {
            if (strlen($nom) <= 100) {
                if (strlen($prenom) <= 100) {
                    if (strlen($tel) <= 14 && is_numeric($tel)) {
                        $query = $bdd->prepare('INSERT INTO fournisseur(raison_soc, nom, prenom, tel) VALUES (:raison_soc, :nom, :prenom, :tel)');
                        $query->execute(array(
                            'raison_soc' => $raison_soc,
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'tel' => $tel,
                        ));
                        header('Location:fournisseur.php?succes');
                    } else {
                        header('Location:fournisseur.php?reg_err=tel');
                    }

                } else {
                    header('Location:fournisseur.php?reg_err=firstname_lenght');
                }
            } else {
                header('location:fournisseur.php?reg_err=lastname_lenght');
            }
        }else{
            header('Location:fournisseur.php?reg_err=raison_soc_lenght');
        }
        } else {
            header('Location:fournisseur.php?reg_err=already');
        }
    } else {
        header('Location:fournisseur.php?reg_err=emptyfield');
    };
