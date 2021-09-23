<?php
require "header.php";
require "database.php";

if (isset($_GET['update']) && !empty(($_GET['update']))) {
    $id = $_GET['update'];
    $ids = intval($_GET['update']);
    $select = $bdd->prepare('SELECT * FROM fournisseur WHERE id = :ids');
    $select->execute(array(
        'ids' => $ids,
    ));
    $data = $select->fetch();
}

?>
    <a href="fournisseur.php">retour</a>
    <form action="fournisseur_update_traitement.php" method="post">
        <label for="raison_soc">Raison sociale</label>
        <input type="hidden" name="id" value="<?php echo $data["id"] ?>">
        <input name="raison_soc" type="text" value="<?= $data["raison_soc"]?>">
        <h3>Contact fournisseur:</h3>
        <label for="nom">nom</label>
        <input name="nom" type="text" value="<?= $data["nom"]?>">
        <label for="prenom">prenom</label>
        <input name="prenom" type="text" value="<?= $data["prenom"]?>">
        <label for="tel">Téléphone</label>
        <input name="tel" type="text" value="<?= $data["tel"]?>">
        <input type="submit">
    </form>
<?php
require "footer.php";
?>