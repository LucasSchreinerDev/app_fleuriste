<?php
require 'header.php';
?>

<h1>Ajouter une variéter de fleurs</h1>
<a href="fleurs.php">Retour</a>
<form action="add_fleur_traitement.php" method="post">
    <label for="varieter">Variéter</label>
    <input type="text" name="varieter">
    <label for="prix">Prix</label>
    <input type="number" name="prix" placeholder="€">
    <input type="submit">
</form>

<?php
require "footer.php";
?>