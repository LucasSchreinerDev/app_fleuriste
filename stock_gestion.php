<?php
require 'header.php';

if (!empty($_GET['update'])){

    $id = htmlentities($_GET['update']);
    $id = intval($id);

    $query = $bdd->prepare("SELECT * FROM fleur_fournisseur WHERE id_fleur = :id_fleur AND ");
    $query->execute(array(
        "id_fleur" => $id,
    ));
    $stock = $query->fetch();

}else header('Location:fleurs.php?add_err=emptyfield');
?>
<?php  var_dump($stock[0]);?>
<br><a href="stock_gestion.php">retour</a>
<h1>Modifier le stock</h1>
    <form action="stock_gestion.php_update" method="post">
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= $stock["stock"]?>">
        <input type="submit">
    </form>

<?php 
require "footer.php";
?>