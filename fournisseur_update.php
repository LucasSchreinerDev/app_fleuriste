<?php
require "header.php";
require "database.php";

if (isset($_GET['update']) && !empty(($_GET['update']))) {
    $id = $_GET['update'];
    $ids = intval($_GET['update']);
    $select = $bdd->prepare('SELECT * FROM fournisseur WHERE id = :ids');
    $select->execute(array(
        'ids' => $ids,
    ));
    $data = $select->fetch();
}

?>
<!--    <a href="fournisseur.php">retour</a>-->
<!--    <form action="fournisseur_update_traitement.php" method="post">-->
<!--        <label for="raison_soc">Raison sociale</label>-->
<!--        <input type="hidden" name="id" value="--><?php //echo $data["id"] ?><!--">-->
<!--        <input name="raison_soc" type="text" value="--><?//= $data["raison_soc"]?><!--">-->
<!--        <h3>Contact fournisseur:</h3>-->
<!--        <label for="nom">nom</label>-->
<!--        <input name="nom" type="text" value="--><?//= $data["nom"]?><!--">-->
<!--        <label for="prenom">prenom</label>-->
<!--        <input name="prenom" type="text" value="--><?//= $data["prenom"]?><!--">-->
<!--        <label for="tel">Téléphone</label>-->
<!--        <input name="tel" type="text" value="--><?//= $data["tel"]?><!--">-->
<!--        <input type="submit">-->
<!--    </form>-->
<h1 class="text-3xl text-center mt-5 text-black pb-6">Ajouter un fournisseur</h1>
<div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
        <div class="md:mt-0 md:col-span-2">
            <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <a href="fournisseur.php">Retour</a>
            </button>
            <form action="fournisseur_update_traitement.php" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <input type="hidden" name="id" value="<?php echo $data["id"] ?>">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="raison_soc" class="block text-sm font-medium text-gray-700">Raison social</label>
                                <input type="text" value="<?= $data["raison_soc"]?>" name="raison_soc" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" value="<?= $data["prenom"]?>" name="prenom" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="nom" value="<?= $data["nom"]?>" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tel" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input type="text" value="<?= $data["tel"]?>" name="tel" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
