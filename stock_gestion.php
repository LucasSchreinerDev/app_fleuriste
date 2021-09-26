<?php
require 'header.php';

if (!empty($_GET['update']) && !empty([$_GET['fournisseur']])){

    $id = htmlentities($_GET['update']);
    $id = intval($id);
    $fournisseur = $_GET['fournisseur'];
    $fournisseur = intval($fournisseur);

    $query = $bdd->prepare("SELECT * 
           FROM fleur_fournisseur 
           INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
           WHERE id_fleur = :id_fleur AND fournisseur.id = :id_fournisseur");
    $query->execute(array(
        "id_fleur" => $id,
        "id_fournisseur" => $fournisseur,
    ));
    $stock = $query->fetch();
}else header('Location:fleurs.php?add_err=emptyfield');
?>

<br><a href="stock_gestion.php">retour</a>
<h1>Modifier le stock</h1>
    <form action="stock_gestion.php" method="post">
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= $stock["stock"]?>">
        <input type="submit">
    </form>

<?php 
require "footer.php";
?>