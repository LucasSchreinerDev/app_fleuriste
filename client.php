<?php
require_once 'database.php';
$insert = $bdd->prepare("SELECT * FROM `client`");
$insert->execute(array());
$clients= $insert->fetchAll();
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
    <div class="feature">
      <h2>Les Clients</h2>
      <form action="" method="get">
       <input type="search" name="searchbar">
       <input type="submit">
      </form>
      <a href="client_add.php">ajouter client</a>
      <a href="index.php">return</a>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Télephone</th>
                <th>Email</th>
            </tr>
            <?php foreach ($clients as $client){?>
            <tr>

                <td><?= $client['nom']?></td>
                <td><?= $client['prenom']?></td>
                <td><?= $client['adresse'].", "." ".$client['ville']?></td>
                <td><?= $client['telephone']?></td>
                <td><?= $client['email']?></td>
                <td><a href="client_commande.php?client=<?=$client['id'] ?>">commande</a></td>
                <td><a href="client_update.php?update=<?= $client['id'] ?>">modifier</a></td>
                <td><a href="client_del.php?del=<?=$client['id'] ?>">supprimer</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
</main>
</body>
</html>
</body>
</html>
