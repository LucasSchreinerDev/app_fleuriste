<?php
require "header.php";
require "database.php";
?>
    <a href="fournisseur.php">retour</a>
    <form action="add_fournisseur_traitement.php" method="post">
        <label for="raison_soc">Raison sociale</label>
        <input name="raison_soc" type="text">
        <h3>Contact fournisseur:</h3>
        <label for="nom">nom</label>
        <input name="nom" type="text">
        <label for="prenom">prenom</label>
        <input name="prenom" type="text">
        <label for="tel">Téléphone</label>
        <input name="tel" type="text">
        <input type="submit">
    </form>

<?php
require "footer.php";
?>