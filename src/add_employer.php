<?php
require_once 'header.php';
/*Je charge le fichier header.php pour éviter de retaper le code*/

/*Si le grade n'est pas admin l'employé n'a pas accès ici*/
if ($user["grade"] < 3){
    header('Location:commande.php?grade=err');
}
?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Ajouter un Employé</h1>
<div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
        <div class="md:mt-0 md:col-span-2">
            <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <a href="liste_employer.php">Retour</a>
            </button>
            <form action="add_employer_traitement.php" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" name="email" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" name="prenom" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="nom" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tel" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input type="text" name="tel" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6">
                                <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                                <select name="grade">
                                    <option value="admin">admin</option>
                                    <option value="employé">employé</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                <input type="password" name="password" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmation du mot de passe</label>
                                <input type="password" name="confirm_password" class="mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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