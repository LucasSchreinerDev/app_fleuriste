<?php
require 'database.php';
if (!empty($_POST["id"]) && !empty($_POST["raison_soc"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["tel"])) {

    $id = htmlentities(intval($_POST['id']));
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
    if (strlen($raison_soc) <= 100) {
        if (strlen($nom) <= 100) {
            if (strlen($prenom) <= 100) {
                if (strlen($tel) <= 10 && is_numeric($tel)) {
                    $query = $bdd->prepare("UPDATE `fournisseur` SET raison_soc = :raison_soc, nom = :nom, prenom = :prenom, tel = :tel WHERE fournisseur.id = :id");
                    $query->execute(array(
                        'id' => $id,
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
                header('Location:fournisseur.php?reg_err=firstname');
            }
        } else {
            header('location:fournisseur.php?reg_err=lastname');
        }
    } else {
        header('Location:fournisseur.php?reg_err=raisonsoc');
    }
} else {
    header('Location:fournisseur.php?reg_err=emptyfield');
}
/*verif numero + employer update fini*/
