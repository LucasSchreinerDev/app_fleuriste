<?php
require 'header.php';

if (!empty($_POST['search'])){
    $num_commande = $_POST['search'];
    $num_commande = intval($num_commande);

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
                                 WHERE num_commande = :num_commande");
$select->execute(array(
    'num_commande' => $num_commande,
));
$commande = $select->fetch();
$row = $select->rowCount();

if ($row === 0){
    header('Location:commande.php?err=cannotfind');
}


?>
    <h2>Commande :</h2>
    <a href="commande_past.php">Commande passée</a><br>
    <a href="add_commande.php">Ajoutée une commande</a>
    <div class="commande">
        <h5>Numéro de commande : <?= $commande[0]?></h5>
        <h5>Date de livraison : <?= $commande[1] ?></h5>
        <h5>Date de commande : <?= $commande[2]?></h5>
        <h5>Adresse de livraison : <?= $commande[3]." ". $commande[4]?></h5>
        <h5>Nom & prenom client : <?= $commande[6]." ".$commande[5]?></h5>
        <h5>Telephone : <?= $commande[9]?></h5>
        <h5>Quantité : <?= $commande[10]?></h5>
        <h5>Total : <?php $total = $commande[10] * $commande[11]; echo $total."€" ?></h5>
        <h5>detail fleur : <?= $commande[7]." ".$commande[8]?></h5>
        <h6>Employer en charge : <?= $commande[12]." ".$commande[13]?></h6>
        <a href="commande_del.php?del=<?=$commande[0]?>">Supprimer</a>
    </div>
    </main>
<?php
require_once "footer.php";
}else{
    header('Location:commande.php?err=empty');
}
?>