<?php
require 'header.php';

if (!empty($_GET['update']) && !empty([$_GET['fournisseur']])){
    /*Pour le fonctionnement php allez voir add_commande_traitement, client update.php , database.php , add_employer.php et pour le css header.php plus*/
    $id = htmlentities($_GET['update']);
    $id = intval($id);
    $fournisseur = $_GET['fournisseur'];
    $fournisseur = intval($fournisseur);

    $query = $bdd->prepare("SELECT * 
           FROM fleur_fournisseur 
           INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
           WHERE id_fleur = :id_fleur AND fournisseur.id = :id_fournisseur");
    $query->execute(array(
        "id_fleur" => $id,
        "id_fournisseur" => $fournisseur,
    ));
    $stock = $query->fetch();
}else header('Location:fleurs.php?add_err=emptyfield');
?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Modifer le stock</h1>
<div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
        <div class="md:mt-0 md:col-span-2">
            <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <a href="fleurs.php">Retour</a>
            </button>
            <form action="stock_gestion_traitement.php" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <input type="hidden" name="fleur_id" value="<?= $id ?>">
                                <input type="hidden" name="fournisseur_id" value="<?= $fournisseur ?>">
                                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                <input type="number" value="<?=$stock["stock"]?>" name="stock" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Envoyer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
require "footer.php";
?>