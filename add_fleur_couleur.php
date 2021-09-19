<?php
require "header.php";
?>
<h1>Ajouter la couleur d'une fleur</h1>
<a href="">Retour</a>
<form action="add_fleur_couleur_traitement.php" method="post">
    <label for="couleur">Couleur</label>
    <input type="text" name="couleur">
    <input type="submit">
</form>
<?php
require 'footer.php';
?>