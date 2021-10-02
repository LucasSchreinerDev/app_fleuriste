<?php
require 'header.php';

$queryC = $bdd->prepare('SELECT * FROM client');
$queryC->execute();
$clients = $queryC->fetchAll();

$queryF = $bdd->prepare("SELECT fleur.id_fleur, variete.libelle, couleur.libelle, fournisseur.raison_soc, fournisseur.id, stock FROM fleur 
    INNER JOIN couleur ON fleur.id_couleur = couleur.id
    INNER JOIN variete ON fleur.id_variete = variete.id
    INNER JOIN fleur_fournisseur ON fleur.id_fleur = fleur_fournisseur.id_fleur
    INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
    ");
$queryF->execute();
$fleurs = $queryF->fetchAll();

?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Ajouter une commande</h1>
<div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
        <div class="md:mt-0 md:col-span-2">
            <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <a href="commande.php">Retour</a>
            </button>
            <form action="add_commande_traitement.php" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="date_livraison" class="block text-sm font-medium text-gray-700">Date de livraison</label>
                                <input type="datetime-local" name="date_livraison" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                                <input type="text" name="adresse" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                                <input type="text" name="city" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6">
                                <label for="cp" class="block text-sm font-medium text-gray-700">Adresse</label>
                                <input type="number" name="cp"  class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="firstname" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" name="firstname" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="lastname" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="lastname" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="mobile" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input type="text" name="mobile" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantité</label>
                                <input type="number" name="quantity" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 mt-5 sm:col-span-3 lg:col-span-2">
                            <label for="fleur_detail">Detail fleur</label>
                            <select name="fleur_detail">
                                <?php foreach ($fleurs as $fleur) { ?>
                                    <?php if ($fleur[5] > 0) { ?>
                                        <option name="fleur" value="<?= $fleur[0]."a".$fleur[4]?>"><?= $fleur[1]." ".$fleur[2]." fournit par ".$fleur[3]." "."(".$fleur[5].")"?></option>
                                    <?php  }} ?>
                            </select>
                            <?php foreach ($fleurs as $fleur) { ?>
                                <input type="hidden" name="id_fournisseur" value="<?= $fleur[4]?>">
                            <?php } ?>
                            </div>
                            <div class="col-span-6 mt-5 sm:col-span-3 lg:col-span-2">
                            <label for="client">Client</label>
                            <select name="client">
                                <?php foreach ($clients as $client) { ?>
                                    <option name="client" value="<?= $client['id']?>"><?= $client['prenom']." ".$client['nom']?></option>
                                <?php } ?>
                            </select>
                            </div>
                            <input type="hidden" name="id_employer" value="<?= $_SESSION['user'] ?>">
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
<?php require 'footer.php'?>

