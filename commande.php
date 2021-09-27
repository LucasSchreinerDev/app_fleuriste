<?php
require 'header.php';

date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');

$select = $bdd->prepare("SELECT num_commande, date_livraison, date_commande, adresse_livraison, commande_fleur.code_postal, client.nom, client.prenom, variete.libelle, couleur.libelle, commande_fleur.tel_contact, quantite, prix 
                                 FROM commande
                                 INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
                                 INNER JOIN client ON commande.id_client = client.id 
                                 INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
                                 INNER JOIN variete ON fleur.id_variete = variete.id 
                                 INNER JOIN couleur ON fleur.id_couleur = couleur.id 
                                 WHERE date_livraison >= :date");
$select->execute(array(
    'date' => $date,
));
$commandes = $select->fetchAll();
?>
    <h2>Les livraisons à venir</h2>
    <a href="commande_past.php">Commande passée</a><br>
    <a href="add_commande.php">Ajoutée une commande</a>
    <?php foreach ($commandes as $commande) {?>
    <div class="commande">
                <h5>Numéro de commande : <?= $commande[0]?></h5>
                <h5>Date de livraison : <?= $commande[1] ?></h5>
                <h5>Date de commande : <?= $commande[2]?></h5>
                <h5>Adresse de livraison : <?= $commande[3]." ". $commande[4]?></h5>
                <h5>Nom & prenom client : <?= $commande[6]." ".$commande[5]?></h5>
                <h5>Telephone : <?= $commande[9]?></h5>
                <h5>Quantité : <?= $commande[10]?></h5>
                <h5>Total :</h5>
                <h5>detail fleur :<?= $commande[7]." ".$commande[8]?></h5>
    </div>
    <?php } ?>
</main>
<?php
require_once "footer.php";
?>