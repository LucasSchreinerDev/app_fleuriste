<?php
require_once "header.php";
require_once 'database.php';
$select = $bdd->prepare("SELECT couleur.libelle, variete.libelle, `stock`, `prix`, `raison_soc`, fournisseur.id, fleur_fournisseur.id_fleur 
FROM variete 
    INNER JOIN `fleur` ON variete.id = fleur.id_variete 
    INNER JOIN couleur ON fleur.id_couleur = couleur.id
    INNER JOIN fleur_fournisseur ON fleur.id_fleur = fleur_fournisseur.id_fleur 
    INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
");
$select->execute();
$fleurs = $select->fetchAll();
?>
    <h1>Fleurs en stocks</h1>
    <a href="add_fleur.php">Ajouter une fleur</a><br>
    <a href="add_fleur_stock.php">Ajouter un nouveau stock</a>

    <div class="table">
        <table>
            <tr>
                <th>Fleur</th>
                <th>Couleur</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Fournisseur</th>
                <?php foreach ($fleurs

                as $fleur){ ?>
            </tr>
            <tr>
                <td><?= $fleur['libelle'] ?></td>
                <td><?= $fleur['0'] ?></td>
                <td><?= $fleur['prix'] ?>€</td>
                <td><?= $fleur['stock'] ?></td>
                <td><?= $fleur['raison_soc'] ?></td>
                <td><a href="stock_gestion.php?update=<?=$fleur[6]?>">Modifier</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
<?php
require_once "footer.php";
?>