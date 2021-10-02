<?php
require_once "header.php";
require_once 'database.php';
if (isset($_GET['update']) && !empty(($_GET['update']))) {
    $id = $_GET['update'];
    $ids = intval($_GET['update']);
    $select = $bdd->prepare('SELECT nom, prenom, telephone, email, adresse, code_postal, ville FROM client WHERE id = :ids');
    $select->execute(array(
        'ids' => $ids,
    ));
    $data = $select->fetch();
}
?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Modifier un(e) client(e)</h1>
<div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
        <div class="md:mt-0 md:col-span-2">
            <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <a href="client.php">Retour</a>
            </button>
            <form action="client_update_traitement.php" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <input type="hidden" name="id" value="<?php echo $_GET["update"] ?>">
                                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" value="<?php echo $data["prenom"] ?>" name="prenom" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" value="<?php echo $data["nom"] ?>" name="nom" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" value="<?php echo $data["email"] ?>" name="email" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6">
                                <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                                <input type="text" value="<?php echo $data["adresse"] ?>"  name="adresse"  class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                                <input type="text"  value="<?php echo $data["ville"] ?>" name="ville" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="code_postal" class="block text-sm font-medium text-gray-700">Code postal</label>
                                <input type="text" value="<?php echo $data["code_postal"] ?>" name="code_postal" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input type="text"  value="<?php echo $data["telephone"] ?>" name="telephone" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
require_once "footer.php";
?>
