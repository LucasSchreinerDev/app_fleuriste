<?php
require 'header.php';

$query = $bdd->prepare("SELECT * FROM fournisseur");
$query->execute();
$fournisseurs = $query->fetchAll();

$queryb = $bdd->prepare('SELECT couleur.id, id_fleur, variete.libelle, couleur.libelle FROM fleur INNER JOIN variete ON fleur.id_variete = variete.id INNER JOIN couleur ON fleur.id_couleur = couleur.id');
$queryb->execute();
$fleurs = $queryb->fetchAll();
//SELECT * FROM variete INNER JOIN fleur ON variete.id = fleur.variete_id
?>
    <br>
    <a href="fleurs.php">Retour</a>
<h1>Ajouter un nouveau stock</h1>
<form action="add_fleur_stock_traitement.php" method="post">
    <label for="variete">Variete</label>
    <select name="variete" id="variete">
        <?php foreach ($fleurs as $fleur) { ;?>
            <option value="<?= $fleur['id_fleur']?>"><?= $fleur['2']."-".$fleur['3']?></option>
        <?php  } ?>
    </select>
        <label for="fournisseur">Fournisseur</label>
        <select name="fournisseur" id="fournisseur">
            <?php foreach ($fournisseurs as $fournisseur){ ?>
                <option value="<?= $fournisseur['id']?>"><?= $fournisseur['raison_soc'] ?></option>
            <?php } ?>
        </select>
    <label for="stock">Stock</label>
    <input name="stock" type="number">
    <input type="submit">
</form>
<?php require 'footer.php'?>