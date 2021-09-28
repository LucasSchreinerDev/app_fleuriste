<?php
session_start();
require_once 'database.php';

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}

$sessionid = intval($_SESSION['user']);

$rank = $bdd->prepare("SELECT * from users where id = :session");
$rank->execute(array(
    'session' => $sessionid,
));
$user = $rank->fetch();

if ($user["grade"] >= 3){
$admin = "admin";

$query = $bdd->prepare('SELECT id, firstname, surname, telephone, email, grade, active FROM users');
$query->execute();
$employers = $query->fetchAll();


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
        <?php if (isset($admin)) { ?>
            <a href="liste_employer.php">Employée</a>
        <?php } ?>
        <a href="client.php">Client</a>
        <a href="commande.php">Commande</a>
        <a href="fleurs.php">Fleurs</a>
        <a href="fournisseur.php">Fournisseur</a>
    </nav>
</header>
<main>
    <b>Bienvenu ! <?= $user[1] ?><br></b>
    <b>Vous êtes <?php
        if (isset($admin)) {
            echo $admin;
        } else echo "Employée";
        ?></b>
    <a href="logout.php">logout</a><br>

    <a href="add_employer.php">Ajouter un employer</a>
    <h1>Liste des employers:</h1>

    <?php foreach ($employers as $employer) { ?>
        <?php
        if ($employer[5] == "3") {
            $employer[5] = "admin";
        }
        if ($employer[5] == "1") {
            $employer[5] = "employer";
        }
        if ($employer[5] == "0") {
            $employer[5] = "inviter";
        }

        if ($employer[6] === "1") {
            $statue = "actif";
        }
        if ($employer[6] === "0") {
            $statue = "innactif";
        }
        if ($employer[6] === "2") {
            $statue = "congé";
        }
        if ($employer[6] === "3") {
            $statue = "vacance";
        }
        if ($employer[6] === "4") {
            $statue = "arret maladie";
        }
        ?>
        <div class="container_employer">
            <?php
            $employer_id = $employer[0];
            ?>
            <h5><?= $employer[1] ?></h5>
            <h5><?= $employer[2] ?></h5>
            <h5><?= $employer[3] ?></h5>
            <h5><?= $employer[4] ?></h5>
            <h5><?= $employer[5] ?></h5>
            <h5><?= $statue ?></h5>
            <a href="employer_historique.php?historique=<?= $employer_id ?>">historique</a>
            <a href="employer_update.php?update=<?= $employer_id ?>.php">Modifer</a>
            <a href="employer_del.php?del=<?=$employer_id?>">Supprimer</a>
        </div>
    <?php }
    } else header('Location:index.php?grade_err'); // commenter ici ?>
</main>
<?php require 'footer.php'?>