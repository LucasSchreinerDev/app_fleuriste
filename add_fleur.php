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
    <h1 class="text-3xl text-center mt-5 text-black pb-6">Ajouter une nouvelle fleur</h1>
    <div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
    <div class="md:mt-0 md:col-span-2">
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_fleur_variete.php">Ajouter une variété</a>
    </button>
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_fleur_couleur.php">Ajouter une couleur</a>
    </button>
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="fleurs.php">Retour</a>
    </button>
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
            <input type="submit"class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" >
</form>
<?php require "footer.php"?>