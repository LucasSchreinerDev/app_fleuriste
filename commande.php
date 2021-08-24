<?php
session_start();
require_once 'database.php';
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}
date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');

$sessionid= intval($_SESSION['user']);

$aaa = $bdd->prepare("SELECT * from users where id = :session");
$aaa->execute(array(
       'session'=> $sessionid,
));
$user = $aaa->fetch();

$select = $bdd->prepare("SELECT date_livraison, lieu_livraison, nom, prenom, libelle
    FROM commande
    INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande
    INNER JOIN client ON commande.id_client = client.id
    INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur
    INNER JOIN variete ON fleur.id_variete = variete.id 
    WHERE date_livraison >= :date");
$select->execute(array(
    'date'=> $date,
));
$commandes = $select->fetchAll();



?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <link href="style.css" rel="stylesheet">
    <title>flower app</title>
</head>
<body>
<header>
    <div class="logo">
        <h1>La boite à fleurs</h1>
    </div>
    <nav>
        <a href="client.php">Client</a>
        <a href="commande.php">Commande</a>
        <a href="fleurs.php">Fleurs</a>
    </nav>
</header>
<main>
    <b>Bienvenu ! <?= $user[1]?> </b>
    <a href="logout.php">logout</a>
    <h2>Les livraisons à venir</h2>
    <a href="commande_past.php">Commande passée</a>
    <div class="table">
        <table>
            <tr>
              <th>Date de livraison</th>
              <th>Adresse de livraison</th>
              <th>Nom & prenom client</th>
              <th>bouquet</th>
            </tr>
            <?php foreach ($commandes as $commande) { ?>
            <tr>
                <td><?= $commande['date_livraison'] ?></td>
                <td><?= $commande['lieu_livraison'] ?></td>
                <td><?= $commande['nom']." ".$commande['prenom']?></td>
                <td><?= $commande['libelle']?></td>

            </tr>
            <?php } ?>
        </table>
    </div>
</main>
</body>
</html>
