<?php
require_once "header.php";
$insert = $bdd->prepare("SELECT * FROM `client`");
$insert->execute(array());
$clients = $insert->fetchAll();
?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Liste des clients</h1>
<div class="w-full mt-12">
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            <a href="client_add.php">Ajouter un client</a>
    </button>
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse">
            <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom & prénom</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Adresse</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Téléphone</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Commande</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Modifier</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Supprimer</th>
            </tr>
            </thead>
            <tbody>
<!--            Pour chaque client afficher un tableau avec les classes personnalisée du framework tailwind très simple à comprendre plus d'info commantaire header.php -->
            <?php foreach ($clients as $client) { ?>
            <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light"><?= $client['nom']." ".$client['prenom'] ?></td>
                <td class="py-4 px-6 border-b border-grey-light"><?= $client['adresse'] . ", " . " " . $client['ville'] . " " . $client['code_postal'] ?></td>
                <td class="py-4 px-6 border-b border-grey-light"><?= $client['telephone'] ?> </td>
                <td class="py-4 px-6 border-b border-grey-light"><?= $client['email'] ?></td>
                <td><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <a href="client_commande.php?client=<?= $client['id'] ?>">commande</a>
                    </button></td>
<!--                Pour chaque bouton j'envoi l'id du client pour soit le supprimer le modifer ou voir ses commandes -->
                <td>    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <a href="client_update.php?update=<?= $client['id'] ?>">modifier</a>
                    </button>
                </td>
                <td><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <a href="client_del.php?del=<?= $client['id'] ?>">supprimer</a>
                    </button></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php
require_once "footer.php"
?>
