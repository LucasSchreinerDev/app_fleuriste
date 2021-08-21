<?php
require 'database.php';
date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');

if (!empty($_GET['client']) && isset($_GET['client'])){
    $id =htmlentities($_GET['client']);
    $select = $bdd->prepare('SELECT nom, prenom, telephone,email,adresse,ville FROM client WHERE id = :id');
    $select->execute(array(
        'id' => $id,
    ));
    $data= $select->fetch();

    $select = $bdd->prepare("
   SELECT num_commande,date_livraison ,date_commande, lieu_livraison, nom, prenom,telephone, email , adresse , client.ville 
    FROM commande 
    INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
    INNER JOIN client ON commande.id_client = client.id 
    INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
    INNER JOIN variete ON fleur.id_variete = variete.id 
    WHERE commande.id_client = :id 
    AND date_livraison <= :date;");
    $select->execute(array(
        'id'=> $id,
        'date'=>$date,
    ));
    $commandes = $select->fetchAll();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="logo">
        <h1>La boite à fleurs</h1>
    </div>
    <nav>
        <a href="client.php">Client</a>
        <a href="index.php">Commande</a>
        <a href="fleurs.php">Fleurs</a>
    </nav>
</header>
<main>
<h1>Client</h1>
   nom :<?= $data['nom']?><br>
   prenom : <?= $data['prenom']?><br>
   adresse : <?= $data['adresse'].", "." ".$data['ville']?><br>
    télephone :<?= $data['telephone']?><br>
    email :<?= $data['email']?><br>
<h1>Commande en cours</h1>
    <table>
    <tr>
        <th>Numéro et ligne de commande</th>
        <th>Date de commande</th>
        <th>Date de livraison</th>
        <th>Adresse de livraison</th>
    </tr>
    <?php foreach ($commandes as $commande){
    ?>
        <tr>
            <td><?= $commande['num_commande'] ?></td>
            <td><?= $commande['date_commande'] ?></td>
            <td><?= $commande['date_livraison']?></td>
            <td><?= $commande['lieu_livraison'].' '.$commande['ville']?></td>
        </tr>

        <?php }  ?>
</table>
    COMMANDE PASSÉE
</body>
</html>