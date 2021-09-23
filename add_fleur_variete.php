<?php
require 'header.php';
$query = $bdd->prepare('SELECT * FROM variete');
$query->execute();
$varietes = $query->fetchAll()
?>

<h1>Ajouter une variéter de fleurs</h1>
<a href="add_fleur.php">Retour</a>
<form action="add_fleur_variete_traitement.php" method="post">
    <label for="varieter">Variéter</label>
    <input type="text" name="varieter">
    <label for="prix">Prix</label>
    <input type="number" name="prix" placeholder="€">
    <input type="submit">
</form>
    <h1>Liste des variétées</h1>
    <form action="variete_del.php" method="post">
        <label for="variete">variete</label>
        <select name="variete">
            <?php foreach ($varietes as $variete) { ?>
             <option value="<?= $variete['id']?>"><?= $variete['libelle']?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Supprimer">
     </form>
<?php
require "footer.php";
?>

<?php foreach ($varietes as $variete){?>
    <option value="<?= $variete['id']?>"<?= $variete['libelle']?>><option>
        <?php
    }?>
<?php require 'footer.php'?>