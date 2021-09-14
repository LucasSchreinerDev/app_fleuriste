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

if ($user["grade"] >= 3) {
    $admin = "admin";

    if (isset($_GET['update']) && !empty(($_GET['update']))) {
        $id = htmlspecialchars($_GET['update']);
        $ids = intval($id);
        $select = $bdd->prepare('SELECT * FROM users WHERE id = :ids');
        $select->execute(array(
            'ids' => $ids,
        ));
        $data = $select->fetch();
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
        <h1>Modifier un employer</h1>
        <a href="liste_employer.php">Retour</a>
        <div class="update">
            <form action="employer_update_traitement.php" method="post">
                <input type="hidden" name="id" value="<?= $_GET["update"] ?>">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?= $data['email'] ?>">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" value="<?= $data['firstname'] ?>">
                <label for="nom">Nom</label>
                <input type="text" name="nom" value="<?= $data['surname'] ?>">
                <label for="tel">Mobile</label>
                <input type="tel" name="tel" value="<?= $data['telephone'] ?>">
                <label for="grade">Grade</label>
                <select name="grade">
                    <option value="admin">admin</option>
                    <option value="employé">employer</option>
                </select>
                <label for="statut">statut</label>
                <select name="statut">
                        <option>Statut</option>
                        <option value="actif">actif</option>
                        <option value="innactif">innactif</option>
                        <option value="conge">congé</option>
                        <option value="vacance">vacance</option>
                        <option value="arret_maladie">arret maladie</option>
<!--                   pq option au lieu de opt groupe pour le statue  -->
                </select>
                <input type="submit">
            </form>
        </div>
    </main>
    </body>
    </html>
<?php } ?>