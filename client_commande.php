<?php
require "header.php";

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}
date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');

if (!empty($_GET['client']) && isset($_GET['client'])) {
    $id = htmlentities($_GET['client']);
    $select = $bdd->prepare('SELECT nom, prenom, telephone,email,adresse,ville FROM client WHERE id = :id');
    $select->execute(array(
        'id' => $id,
    ));
    $data = $select->fetch();

    $select = $bdd->prepare("SELECT num_commande, date_livraison, date_commande, adresse_livraison, commande_fleur.code_postal, client.nom, client.prenom, variete.libelle, couleur.libelle, commande_fleur.tel_contact, quantite, prix, users.firstname, users.surname 
                                 FROM commande
                                 INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
                                 INNER JOIN client ON commande.id_client = client.id 
                                 INNER JOIN users ON commande.id_users = users.id    
                                 INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
                                 INNER JOIN variete ON fleur.id_variete = variete.id 
                                 INNER JOIN couleur ON fleur.id_couleur = couleur.id 
                                 WHERE date_livraison >= :date AND client.id = :id");
    $select->execute(array(
        'date' => $date,
        'id' => $id,
    ));
    $commandes = $select->fetchAll();
    $row = $select->rowCount();
    if ($row === 0){
        header('Location:client.php?');
    }
    $select = $bdd->prepare("SELECT num_commande, date_livraison, date_commande, adresse_livraison, commande_fleur.code_postal, client.nom, client.prenom, variete.libelle, couleur.libelle, commande_fleur.tel_contact, quantite, prix, users.firstname, users.surname 
                                 FROM commande
                                 INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
                                 INNER JOIN client ON commande.id_client = client.id 
                                 INNER JOIN users ON commande.id_users = users.id    
                                 INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
                                 INNER JOIN variete ON fleur.id_variete = variete.id 
                                 INNER JOIN couleur ON fleur.id_couleur = couleur.id 
                                 WHERE date_livraison <= :date AND client.id = :id");
$select->execute(array(
    'date' => $date,
    'id' => $id,
));
$commandes_passee = $select->fetchAll();
}
?>
<a href="commande.php">Retour</a>
    <h1>Client</h1>
    nom :<?= $data['nom'] ?><br>
    prenom : <?= $data['prenom'] ?><br>
    adresse : <?= $data['adresse'] . ", " . " " . $data['ville'] ?><br>
    télephone :<?= $data['telephone'] ?><br>
    email :<?= $data['email'] ?><br>
    <h1>Commande à venir </h1>
<?php foreach ($commandes as $commande) {?>
    <div class="commande">
        <h5>Numéro de commande : <?= $commande[0]?></h5>
        <h5>Date de livraison : <?= $commande[1] ?></h5>
        <h5>Date de commande : <?= $commande[2]?></h5>
        <h5>Adresse de livraison : <?= $commande[3]." ". $commande[4]?></h5>
        <h5>Nom & prenom client : <?= $commande[6]." ".$commande[5]?></h5>
        <h5>Telephone : <?= $commande[9]?></h5>
        <h5>Quantité : <?= $commande[10]?></h5>
        <h5>Total : <?php $total = $commande[10] * $commande[11]; echo $total."€" ?></h5>
        <h5>detail fleur : <?= $commande[7]." ".$commande[8]?></h5>
        <h6>Employer en charge : <?= $commande[12]." ".$commande[13]?></h6>
    </div>
<?php }?>
    <h1>Commande passée</h1>
<?php foreach ($commandes_passee as $commande_passee) {?>
    <div class="commande">
        <h5>Numéro de commande : <?= $commande_passee[0]?></h5>
        <h5>Date de livraison : <?= $commande_passee[1] ?></h5>
        <h5>Date de commande : <?= $commande_passee[2]?></h5>
        <h5>Adresse de livraison : <?= $commande_passee[3]." ". $commande_passee[4]?></h5>
        <h5>Nom & prenom client : <?= $commande_passee[6]." ".$commande_passee[5]?></h5>
        <h5>Telephone : <?= $commande_passee[9]?></h5>
        <h5>Quantité : <?= $commande_passee[10]?></h5>
        <h5>Total : <?php $total = $commande_passee[10] * $commande_passee[11]; echo $total."€" ?></h5>
        <h5>detail fleur : <?= $commande_passee[7]." ".$commande_passee[8]?></h5>
        <h6>Employer en charge : <?= $commande_passee[12]." ".$commande_passee[13]?></h6>
    </div>
<?php } ?>
<?php
require_once "footer.php";
?>
