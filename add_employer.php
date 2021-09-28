<?php
require_once 'header.php';
require_once 'database.php';
if ($user["grade"] < 3){
    header('Location:commande.php?grade=err');
}
?>
<br>
    <a href="liste_employer.php">Retour</a>
    <form action="add_employer_traitement.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom">
        <label for="nom">Nom</label>
        <input type="tel" name="nom">
        <label for="tel">Mobile</label>
        <input type="text" name="tel">
        <label for="grade">Grade</label>
        <select name="grade">
            <option value="admin">admin</option>
            <option value="employé">employé</option>
        </select>
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
        <label for="password">Confirmer mot de passe</label>
        <input type="password" name="confirm_password">
        <input type="submit">
    </form>
<?php
require_once "footer.php";
?>