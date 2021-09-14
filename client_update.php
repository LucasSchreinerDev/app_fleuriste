<?php
require_once "header.php";
require_once 'database.php';
 if (isset($_GET['update']) && !empty(($_GET['update'])) ) {
     $id = $_GET['update'];
     $ids = intval($_GET['update']);
     $select = $bdd->prepare('SELECT nom, prenom, telephone, email, adresse, code_postal, ville FROM client WHERE id = :ids');
     $select->execute(array(
             'ids' => $ids,
     ));
     $data= $select->fetch();
}
?>
    <h1>Modifier un client</h1>
    <a href="client.php">Retour</a>
    <div class="client_add">
        <form action="client_update_traitement.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET["update"] ?>">
            <input type="text" name="prenom" value="<?php echo $data["prenom"] ?>">
            <input type="text" name="nom" value="<?php echo $data["nom"] ?>">
            <input type="text" name="telephone" value="<?php echo $data["telephone"] ?>">
            <input type="email" name="email" value="<?php echo $data["email"] ?>">
            <input type="text" name="adresse" value="<?php echo $data["adresse"]?>">
            <input type="text" name="code_postal" value="<?php echo $data["code_postal"]?>">
            <input type="text" name="ville" value="<?php echo $data["ville"] ?>">
            <input type="submit">
        </form>
    </div>
<?php
require_once "footer.php";
?>
