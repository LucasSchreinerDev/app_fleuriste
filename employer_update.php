<?php
require 'header.php';
require_once 'database.php';
      if ($user["grade"] > 1){
    if (isset($_GET['update']) && !empty(($_GET['update']))) {
        $id = htmlspecialchars($_GET['update']);
        $ids = intval($id);
        $select = $bdd->prepare('SELECT * FROM users WHERE id = :ids');
        $select->execute(array(
            'ids' => $ids,
        ));
        $data = $select->fetch();
    }
          /*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
          ?>
          <h1 class="text-3xl text-center mt-5 text-black pb-6">Modifer un(e) Employé(e)</h1>
          <div class="mt-10 sm:mt-0">
              <div class="flex justify-center">
                  <div class="md:mt-0 md:col-span-2">
                      <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                          <a href="liste_employer.php">Retour</a>
                      </button>
                      <form action="employer_update_traitement.php" method="POST">
                          <div class="shadow overflow-hidden sm:rounded-md">
                              <div class="px-4 py-5 bg-white sm:p-6">
                                  <div class="grid grid-cols-6 gap-6">
                                      <input type="hidden" name="id" value="<?= $_GET["update"] ?>">
                                      <div class="col-span-6 sm:col-span-4">
                                          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                          <input type="text" value="<?= $data['email'] ?>" name="email" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                      </div>
                                      <div class="col-span-6 sm:col-span-3">
                                          <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                                          <input type="text" value="<?= $data['firstname'] ?>" name="prenom" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                      </div>
                                      <div class="col-span-6 sm:col-span-3">
                                          <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                          <input type="text" value="<?= $data['surname'] ?>" name="nom" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                      </div>
                                      <div class="col-span-6 sm:col-span-3">
                                          <label for="tel" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                          <input type="text" value="<?= $data['telephone'] ?>" name="tel" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                      </div>
                                      <div class="col-span-6">
                                          <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                                          <select name="grade">
                                              <option value="admin">admin</option>
                                              <option value="employé">employé</option>
                                          </select>
                                      </div>
                                      <div class="col-span-6">
                                          <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                                          <select name="statut">
                                              <option value="actif">Statut</option>
                                              <option value="actif">actif</option>
                                              <option value="innactif">innactif</option>
                                              <option value="conge">congé</option>
                                              <option value="vacance">vacance</option>
                                              <option value="arret_maladie">arret maladie</option>
                                          </select>
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
<?php } else{
    header('Location:commande.php?reg_err=grade');
    }
      ?>
    <?php require 'footer.php'?>
