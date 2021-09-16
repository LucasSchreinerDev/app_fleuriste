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
        <p>raison sociale : <?= $data["raison_soc"] ?> </p>
        <p>nom : <?= $data["nom"] ?> </p>
        <p>prenom : <?= $data["prenom"] ?> </p>
        <p>télephone : <?= $data["tel"] ?> </p>
    <?php } ?>
</div>
<?php
require "footer.php";
?>
