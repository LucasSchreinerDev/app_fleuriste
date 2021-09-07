<?php
session_start();
require_once 'database.php';

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}

$sessionid= intval($_SESSION['user']);

$rank = $bdd->prepare("SELECT * from users where id = :session");
$rank->execute(array(
    'session'=> $sessionid,
));
$user = $rank->fetch();

if ($user["grade"] >= 3){
$admin = "admin";

if (isset($_GET["err"])){
     $ids = $_GET["err"];
}

if (isset($_GET['update']) && !empty(($_GET['update']))) {
    $id = htmlspecialchars($_GET['update']);
    $ids = intval($id);
    $select = $bdd->prepare('SELECT * FROM users WHERE :ids');
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
        <?php if (isset($admin))
        { ?>
            <a href="liste_employer.php">Employée</a>
        <?php } ?>
        <a href="client.php">Client</a>
        <a href="commande.php">Commande</a>
        <a href="fleurs.php">Fleurs</a>
    </nav>
</header>
<main>
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
<!--       --><?php
         $grade = intval($data["grade"]);
        //if ($data['grade'] == "3") {
//        $data['grade'] = "admin";}
//        if ($data['grade'] == "1") {
//        $data['grade'] = "employer";}
//        if ($data['grade'][5] == "0") {
//        $data['grade'] = "inviter";} ?>
        <input type="number" name="grade" value="<?= $grade ?>">

        <input type="submit">
    </form>
    </div>
</main>
</body>
</html>
<?php } ?>