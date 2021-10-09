<?php
require "header.php";

$query = $bdd->prepare('SELECT * FROM fournisseur');
$query->execute();
$datas = $query->fetchAll()
  /*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/

?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Liste des Fournisseurs</h1>
<div class="w-full mt-12">
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_fournisseur.php">Ajouter un fournisseur </a>
    </button>
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse">
            <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Raison social</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Adresse</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Téléphone</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Modifier</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($datas as $data) { ?>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"><?= $data['prenom']." ".$data['nom'] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?=$data["raison_soc"] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $data['tel'] ?> </td>
                    <td>    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="fournisseur_update.php?update=<?=$data["id"]?>">Modifier</a>
                        </button>
                    </td>
                    <td><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="fournisseur_del.php?del=<?=$data['id']?>">Supprimer</a>
                        </button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php
require "footer.php";
?>
