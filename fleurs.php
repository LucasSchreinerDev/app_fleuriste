<?php
session_start();
require_once 'database.php';
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}
$select = $bdd->prepare("SELECT `libelle`, `stock`, `raison_soc` FROM variete INNER JOIN `fleur` ON variete.id = fleur.id_variete INNER JOIN fleur_fournisseur ON fleur.id_fleur = fleur_fournisseur.id_fleur INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
");
$select->execute();
$fleurs= $select->fetchAll();
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
        <a href="commande.php">Commande</a>
        <a href="fleurs.php">Fleurs</a>
    </nav>
</header>
<main>
    <h2>Les livraisons à venir</h2>
    <a href="commande_past.php">Commande passée</a>
    <div class="table">
        <table>
            <tr>
                <th>Fleur</th>
                <th>Stock</th>
                <th>Fournisseur</th>
          <?php foreach ($fleurs as $fleur){ ?>
            </tr>
                <tr>
                    <td><?= $fleur['libelle'] ?></td>
                    <td><?= $fleur['stock'] ?></td>
                    <td><?= $fleur['raison_soc'] ?></td>
                </tr>
            <?php }?>
        </table>
    </div>
</main>
</body>
</html>
