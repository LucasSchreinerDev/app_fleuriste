<?php
require 'header.php';
$query = $bdd->prepare('SELECT * FROM variete');
$query->execute();
$varietes = $query->fetchAll()
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
?>

    <h1 class="text-3xl text-center mt-5 text-black pb-6">Ajouter une variétée de fleur</h1>
    <div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
    <div class="md:mt-0 md:col-span-2">
    <button class="mb-2 ml-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_fleur.php">Retour</a>
    </button>
    <form action="add_fleur_variete_traitement.php" method="POST">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <label for="varieter" class="block text-sm font-medium text-gray-700">Variété</label>
                    <input type="text" name="varieter" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
                    <input type="number" name="prix" placeholder="€" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <button type="submit" class="mt-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Envoyer
            </button>
            </div>
        </div>
</form>
     <h1 class="text-3xl text-center mt-5 mb-5" >Liste des variétés</h1>
    <form action="variete_del.php" method="post">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
        <label for="variete">Variétés</label>
        <select name="variete">
            <?php foreach ($varietes as $variete) { ?>
             <option value="<?= $variete['id']?>"><?= $variete['libelle']?></option>
            <?php } ?>
        </select>
                    </div>
                </div>
                        <button type="submit" class="mt-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Supprimer
                        </button>
            </div>
     </form>
<?php
require "footer.php";
?>

<?php foreach ($varietes as $variete){?>
    <option value="<?= $variete['id']?>"<?= $variete['libelle']?>><option>
        <?php
    }?>
<?php require 'footer.php'?>