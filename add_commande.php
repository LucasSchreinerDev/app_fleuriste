<?php
require 'header.php';

$queryC = $bdd->prepare('SELECT * FROM client');
$queryC->execute();
$clients = $queryC->fetchAll();

$queryF = $bdd->prepare("SELECT fleur.id_fleur, variete.libelle, couleur.libelle, fournisseur.raison_soc, fournisseur.id, stock FROM fleur 
    INNER JOIN couleur ON fleur.id_couleur = couleur.id
    INNER JOIN variete ON fleur.id_variete = variete.id
    INNER JOIN fleur_fournisseur ON fleur.id_fleur = fleur_fournisseur.id_fleur
    INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
    ");
$queryF->execute();
$fleurs = $queryF->fetchAll();

?>
<!--Pour les quantite  -->
<br>
<a href="commande.php">Retour</a>
<h1>Ajouter une nouvelle commande</h1>
<form action="add_commande_traitement.php" method="post">
    <label for="date_livraison">Date de la livraison</label>
    <input type="datetime-local" name="date_livraison">
    <label for="adresse">Adresse</label>
    <input type="text" name="adresse">
    <label for="city">Ville</label>
    <input type="text" name="city">
    <label for="cp">Code postal</label>
    <input type="number" name="cp">
    <label for="firstname">Prénom</label>
    <input type="text" name="firstname">
    <label for="lastname">nom</label>
    <input type="text" name="lastname">
    <label for="mobile">Telephone</label>
    <input type="text" name="mobile" >
    <label for="quantity">Quantité</label>
    <input type="number" name="quantity">
    <label for="fleur_detail">Detail fleur</label>
    <select name="fleur_detail">
        <?php foreach ($fleurs as $fleur) { ?>
                <?php if ($fleur[5] > 0) { ?>
        <option name="fleur" value="<?= $fleur[0]."a".$fleur[4]?>"><?= $fleur[1]." ".$fleur[2]." fournit par ".$fleur[3]." "."(".$fleur[5].")"?></option>

                <?php  }} ?>
    </select>
    <?php foreach ($fleurs as $fleur) { ?>
    <input type="hidden" name="id_fournisseur" value="<?= $fleur[4]?>">
    <?php } ?>
    <label for="client">Client</label>
    <select name="client">
        <?php foreach ($clients as $client) { ?>
            <option name="client" value="<?= $client['id']?>"><?= $client['prenom']." ".$client['nom']?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="id_employer" value="<?= $_SESSION['user'] ?>">
    <input type="submit">
</form>
