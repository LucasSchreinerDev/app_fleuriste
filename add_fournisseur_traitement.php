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
        if (strlen($nom) <= 100) {
            if (strlen($prenom) <= 100) {
                if (strlen($tel) <= 14) {
                    $query = $bdd->prepare('INSERT INTO fournisseur(raison_soc, nom, prenom, tel) VALUES (:raison_soc, :nom, :prenom, :tel)');
                    $query->execute(array(
                        'raison_soc' => $raison_soc,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'tel' => $tel,
                    ));
                    header('Location:fournisseur.php');
                } else
                    header('Location:fournisseur.php?tel_err');

            } else
                header('Location:fournisseur.php?firstname_err');
        } else
            header('location:fournisseur.php?lastname_err');

    } else
        header('Location:fournisseur?field_err');
}