<?php
require "header.php";

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}
date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');

if (!empty($_GET['client']) && isset($_GET['client'])) {
    $id = htmlentities($_GET['client']);
    $select = $bdd->prepare('SELECT nom, prenom, telephone,email,adresse,ville FROM client WHERE id = :id');
    $select->execute(array(
        'id' => $id,
    ));
    $data = $select->fetch();

    $select = $bdd->prepare("SELECT num_commande, date_livraison, date_commande, adresse_livraison, commande_fleur.code_postal, client.nom, client.prenom, variete.libelle, couleur.libelle, commande_fleur.tel_contact, quantite, prix, users.firstname, users.surname 
                                 FROM commande
                                 INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
                                 INNER JOIN client ON commande.id_client = client.id 
                                 INNER JOIN users ON commande.id_users = users.id    
                                 INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
                                 INNER JOIN variete ON fleur.id_variete = variete.id 
                                 INNER JOIN couleur ON fleur.id_couleur = couleur.id 
                                 WHERE date_livraison >= :date AND client.id = :id");
    $select->execute(array(
        'date' => $date,
        'id' => $id,
    ));
    $commandes = $select->fetchAll();
    $row = $select->rowCount();
    if ($row === 0){
        header('Location:client.php?');
    }
    $select = $bdd->prepare("SELECT num_commande, date_livraison, date_commande, adresse_livraison, commande_fleur.code_postal, client.nom, client.prenom, variete.libelle, couleur.libelle, commande_fleur.tel_contact, quantite, prix, users.firstname, users.surname 
                                 FROM commande
                                 INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
                                 INNER JOIN client ON commande.id_client = client.id 
                                 INNER JOIN users ON commande.id_users = users.id    
                                 INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
                                 INNER JOIN variete ON fleur.id_variete = variete.id 
                                 INNER JOIN couleur ON fleur.id_couleur = couleur.id 
                                 WHERE date_livraison <= :date AND client.id = :id");
$select->execute(array(
    'date' => $date,
    'id' => $id,
));
$commandes_passee = $select->fetchAll();
}
?>
<h1 class="text-3xl text-center mt-5 text-black pb-6">Commandes du client</h1>
<div class="w-full mt-12">
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="client.php">Retour</a>
    </button>
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
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
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Supprimer</th>
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
                    <td><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="commande_del.php?del=<?=$commande[0]?>">Supprimer</a>
                        </button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<!--    <h1>Commande passée</h1>-->
<?php //foreach ($commandes_passee as $commande_passee) {?>
<!--    <div class="commande">-->
<!--        <h5>Numéro de commande : --><?//= $commande_passee[0]?><!--</h5>-->
<!--        <h5>Date de livraison : --><?//= $commande_passee[1] ?><!--</h5>-->
<!--        <h5>Date de commande : --><?//= $commande_passee[2]?><!--</h5>-->
<!--        <h5>Adresse de livraison : --><?//= $commande_passee[3]." ". $commande_passee[4]?><!--</h5>-->
<!--        <h5>Nom & prenom client : --><?//= $commande_passee[6]." ".$commande_passee[5]?><!--</h5>-->
<!--        <h5>Telephone : --><?//= $commande_passee[9]?><!--</h5>-->
<!--        <h5>Quantité : --><?//= $commande_passee[10]?><!--</h5>-->
<!--        <h5>Total : --><?php //$total = $commande_passee[10] * $commande_passee[11]; echo $total."€" ?><!--</h5>-->
<!--        <h5>detail fleur : --><?//= $commande_passee[7]." ".$commande_passee[8]?><!--</h5>-->
<!--        <h6>Employer en charge : --><?//= $commande_passee[12]." ".$commande_passee[13]?><!--</h6>-->
<!--    </div>-->
<?php //} ?>
<?php
require_once "footer.php";
?>
