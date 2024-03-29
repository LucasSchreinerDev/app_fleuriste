<?php
require 'header.php';
date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');
$select = $bdd->prepare("SELECT num_commande, date_livraison, date_commande, adresse_livraison, commande_fleur.code_postal, client.nom, client.prenom, variete.libelle, couleur.libelle, commande_fleur.tel_contact, quantite, prix, users.firstname, users.surname 
                                 FROM commande
                                 INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
                                 INNER JOIN client ON commande.id_client = client.id 
                                 INNER JOIN users ON commande.id_users = users.id    
                                 INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
                                 INNER JOIN variete ON fleur.id_variete = variete.id 
                                 INNER JOIN couleur ON fleur.id_couleur = couleur.id 
                                 WHERE date_livraison <= :date");
$select->execute(array(
    'date' => $date,
));
$commandes = $select->fetchAll();
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Liste des commandes passée</h1>
<div class="w-full mt-12">
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="commande.php">Retour</a>
    </button>
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse">
            <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Numéro de commande</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de livraison</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de commande</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Adresse de livraison</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom & prenom client</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Téléphone</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Quantité</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Total</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Detail fleurs</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Employé(e) en charge</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($commandes as $commande) { ?>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"><?=  $commande[0] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?=$commande[1] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?=$commande[2] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[3]." ". $commande[4] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[6]." ".$commande[5] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[9]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[10]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"> <?php $total = $commande[10] * $commande[11]; echo $total."€" ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"> <?= $commande[7]." ".$commande[8]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"> <?= $commande[12]." ".$commande[13]?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    require_once "footer.php";
    ?>
