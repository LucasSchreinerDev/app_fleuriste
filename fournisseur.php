<?php
require "header.php";
require "database.php";

$query = $bdd->prepare('SELECT * FROM fournisseur');
$query->execute();
$datas = $query->fetchAll()
?>
<div class="container">
    <a href="add_fournisseur.php">Ajouter un fournisseur </a>
</div>
<div class="containeur">
    <h2>Liste des fournisseurs</h2>

    <?php foreach ($datas as $data) { ?>
        <div class="container_employer">
        <h5>raison sociale : <?= $data["raison_soc"] ?> </h5>
        <h5>nom : <?= $data["nom"] ?> </h5>
        <h5>prenom : <?= $data["prenom"] ?> </h5>
        <h5>télephone : <?= $data["tel"] ?> </h5>
            <a href="fournisseur_update.php?update=<?=$data["id"]?>">Modifier</a>
            <a href="fournisseur_del.php">Supprimer</a>
        </div>
    <?php } ?>
</div>
<?php
require "footer.php";
?>
