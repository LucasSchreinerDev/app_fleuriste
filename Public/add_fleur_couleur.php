<?php
require "header.php";

$query = $bdd->prepare('SELECT * FROM couleur');
$query->execute();
$couleurs = $query->fetchAll()
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
?>
    <h1 class="text-3xl text-center mt-5 text-black pb-6">Ajouter une couleur</h1>
    <div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
    <div class="md:mt-0 md:col-span-2">
    <button class="mb-2 ml-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_fleur.php">Retour</a>
    </button>
    <form action="add_fleur_couleur_traitement.php" method="POST">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label for="couleur" class="block text-sm font-medium text-gray-700">Couleur</label>
                        <input type="text" name="couleur" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <button type="submit" class="mt-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Envoyer
                </button>
            </div>
        </div>
    </form>
    <h1 class="text-3xl text-center mt-5 mb-5" >Liste des couleurs</h1>
    <form action="couleur_del.php" method="post">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label for="couleur">Couleurs</label>
                        <select name="couleur">
                            <?php foreach ($couleurs as $couleur) { ?>
                                <option name="" value="<?= $couleur['id']?>"><?= $couleur['libelle']?></option>
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
require 'footer.php';
?>