<?php
require_once "header.php";
require_once 'database.php';
$select = $bdd->prepare("SELECT fournisseur.id, couleur.libelle, variete.libelle, `stock`, `prix`, `raison_soc`, fournisseur.id, fleur_fournisseur.id_fleur 
    FROM variete 
    INNER JOIN `fleur` ON variete.id = fleur.id_variete 
    INNER JOIN couleur ON fleur.id_couleur = couleur.id
    INNER JOIN fleur_fournisseur ON fleur.id_fleur = fleur_fournisseur.id_fleur 
    INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
");
$select->execute();
$fleurs = $select->fetchAll();

?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Liste des fleurs</h1>
<div class="w-full mt-12">
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_fleur.php">Ajouter une nouvelle fleur</a>
    </button>
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_fleur_stock.php">Ajouter un nouveau stock</a>
    </button>
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Fleurs</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Couleurs</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Prix</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Stock</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Fournisseur</th>
                <th class=" ml-10 py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Modifier le stock</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fleurs as $fleur) { ?>
                <tr class="hover:bg-grey-lighter" <?php if ($fleur["stock"] < 25) { echo " class='alert-rouge'";}?>>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $fleur['libelle'] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $fleur['1'] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $fleur['prix'] ?> </td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $fleur['stock']?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $fleur['raison_soc']?></td>
                    <td>    <button class="ml-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="stock_gestion.php?update=<?=$fleur[7]?>&fournisseur=<?=$fleur[0]?>">Modifier</a>
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php
require_once "footer.php";
?>

