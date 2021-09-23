<?php
require 'header.php';
require_once 'database.php';

    if (isset($_GET['update']) && !empty(($_GET['update']))) {
        $id = htmlspecialchars($_GET['update']);
        $ids = intval($id);
        $select = $bdd->prepare('SELECT * FROM users WHERE id = :ids');
        $select->execute(array(
            'ids' => $ids,
        ));
        $data = $select->fetch();
    }
    ?>
        <h1>Modifier un employer</h1>
        <a href="liste_employer.php">Retour</a>
        <div class="update">
            <form action="employer_update_traitement.php" method="post">
                <input type="hidden" name="id" value="<?= $_GET["update"] ?>">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?= $data['email'] ?>">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" value="<?= $data['firstname'] ?>">
                <label for="nom">Nom</label>
                <input type="text" name="nom" value="<?= $data['surname'] ?>">
                <label for="tel">Mobile</label>
                <input type="tel" name="tel" value="<?= $data['telephone'] ?>">
                <label for="grade">Grade</label>
                <select name="grade">
                    <option value="admin">admin</option>
                    <option value="employé">employer</option>
                </select>
                <label for="statut">statut</label>
                <select name="statut">
                        <option>Statut</option>
                        <option value="actif">actif</option>
                        <option value="innactif">innactif</option>
                        <option value="conge">congé</option>
                        <option value="vacance">vacance</option>
                        <option value="arret_maladie">arret maladie</option>
<!--                   pq option au lieu de opt groupe pour le statue  -->
                </select>
                <input type="submit">
            </form>
        </div>
<?php require 'footer.php'?>    