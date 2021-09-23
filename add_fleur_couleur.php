<?php
require "header.php";

$query = $bdd->prepare('SELECT * FROM couleur');
$query->execute();
$couleurs = $query->fetchAll()
?>
<h1>Ajouter la couleur d'une fleur</h1>
<a href="add_fleur.php">Retour</a>
<form action="add_fleur_couleur_traitement.php" method="post">
    <label for="couleur">Couleur</label>
    <input type="text" name="couleur">
    <input type="submit">
</form>
<form action="couleur_del.php" method="post">
    <label for="couleur">couleur</label>
    <select name="couleur">
        <?php foreach ($couleurs as $couleur) { ?>
            <option name="" value="<?= $couleur['id']?>"><?= $couleur['libelle']?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Supprimer">
</form>
<?php
require 'footer.php';
?>