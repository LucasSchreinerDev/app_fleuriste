<?php
require 'header.php';

$query = $bdd->prepare("SELECT * FROM fournisseur");
$query->execute();
$fournisseurs = $query->fetchAll();

$queryb = $bdd->prepare('SELECT couleur.id, id_fleur, variete.libelle, couleur.libelle FROM fleur INNER JOIN variete ON fleur.id_variete = variete.id INNER JOIN couleur ON fleur.id_couleur = couleur.id');
$queryb->execute();
$fleurs = $queryb->fetchAll();
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/

?>
<h1 class="text-3xl text-center mt-5 text-black pb-6"> Ajouter un nouveau stock </h1>
<div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
        <div class="md:mt-0 md:col-span-2">
            <button class="mb-2 ml-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <a href="add_fleur.php">Retour</a>
            </button>
            <form action="add_fleur_stock_traitement.php" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                <input type="number" name="stock" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <br>
                            <div class="col-span-6 sm:col-span-3">
                            <label for="variete">Variete</label>
                            <select name="variete" id="variete">
                                <?php foreach ($fleurs as $fleur) { ;?>
                                    <option value="<?= $fleur['id_fleur']?>"><?= $fleur['2']."-".$fleur['3']?></option>
                                <?php  } ?>
                            </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                            <label for="fournisseur">Fournisseur</label>
                            <select name="fournisseur" id="fournisseur">
                                <?php foreach ($fournisseurs as $fournisseur){ ?>
                                    <option value="<?= $fournisseur['id']?>"><?= $fournisseur['raison_soc'] ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="mt-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Envoyer
                        </button>
                    </div>
                </div>
            </form>
<?php require 'footer.php'?>
