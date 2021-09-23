<?php
require 'header.php';
require 'database.php';

$query = $bdd->prepare("SELECT * FROM variete");
$query->execute();
$varietes = $query->fetchAll();

$queryb = $bdd->prepare("SELECT * FROM couleur");
$queryb->execute();
$couleurs = $queryb->fetchAll();
?>

<h1>Ajouter une fleur</h1>

<a href="add_fleur_variete.php">Ajouter une variete de fleur</a><br>
<a href="add_fleur_couleur.php">Ajouter une couleur de fleur</a><br>
<a href="fleurs.php">retour</a>
<form action="add_fleur_traitement.php" method="post">
    <label for="variete">Variete</label>
    <select name="variete" id="variete">
    <?php foreach ($varietes as $variete){ ?>
        <option value="<?= $variete['0']?>"><?= $variete['1']?></option>
    <?php } ?>
    </select>
        <label for="couleur">couleur</label>
        <select name="couleur" id="couleur">
            <?php foreach ($couleurs as $couleur){ ?>
                <option value="<?= $couleur['0']?>"><?= $couleur['1']?></option>
            <?php } ?>
            <input type="submit">
</form>
<?php require "footer.php"?>