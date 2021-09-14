<?php
require_once "header.php";
require_once 'database.php';

$insert = $bdd->prepare("SELECT * FROM `client`");
$insert->execute(array());
$clients= $insert->fetchAll();
?>
    <div class="feature">
      <h2>Les Clients</h2>
      <form action="" method="get">
       <input type="search" name="searchbar">
       <input type="submit">
      </form>
      <a href="client_add.php">ajouter client</a>
      <a href="commande.php">return</a>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Télephone</th>
                <th>Email</th>
            </tr>
            <?php foreach ($clients as $client){?>
            <tr>

                <td><?= $client['nom']?></td>
                <td><?= $client['prenom']?></td>
                <td><?= $client['adresse'].", "." ".$client['ville']." ".$client['code_postal']?></td>
                <td><?= $client['telephone']?></td>
                <td><?= $client['email']?></td>
                <td><a href="client_commande.php?client=<?=$client['id'] ?>">commande</a></td>
                <td><a href="client_update.php?update=<?= $client['id'] ?>">modifier</a></td>
                <td><a href="client_del.php?del=<?=$client['id'] ?>">supprimer</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
<?php
require_once "footer.php"
?>