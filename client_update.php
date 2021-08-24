<?php
session_start();
require_once 'database.php';
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}
 if (isset($_GET['update']) && !empty(($_GET['update'])) ) {
     $id = $_GET['update'];
     $select = $bdd->prepare('SELECT nom, prenom, telephone,email,adresse,ville FROM client WHERE :id');
     $select->execute(array(
             'id' => $id,
     ));
     $data= $select->fetch();
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
        <a href="client_commande.php">Commande</a>
        <a href="fleurs.php">Fleurs</a>
    </nav>                                                                                                                                                                                                       é,
</header>
<main>
    <h1>Modifier un client</h1>
    <div class="client_add">
        <form action="client_update_traitement.php" method="post">
            <input type="text" name="firstname" value="<?php echo $data[1] ?>">
            <input type="text" name="lastname" value="<?php echo $data[0] ?>">
            <input type="text" name="phone" value="<?php echo $data[2] ?>">
            <input type="email" name="email" value="<?php echo $data[3] ?>">
            <input type="text" name="address" value="<?php echo $data[4]?>">
            <input type="text" name="city" value="<?php echo $data[5] ?>">
            <input type="submit">
        </form>
    </div>
</form>
</main>
</body>
</html>
