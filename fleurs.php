<?php
require_once "header.php";
require_once 'database.php';
$select = $bdd->prepare("SELECT `libelle`, `stock`, `raison_soc` FROM variete INNER JOIN `fleur` ON variete.id = fleur.id_variete INNER JOIN fleur_fournisseur ON fleur.id_fleur = fleur_fournisseur.id_fleur INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id
");
$select->execute();
$fleurs = $select->fetchAll();
?>
    <h2>Les livraisons à venir</h2>
    <a href="commande_past.php">Commande passée</a>
    <div class="table">
        <table>
            <tr>
                <th>Fleur</th>
                <th>Stock</th>
                <th>Fournisseur</th>
                <?php foreach ($fleurs

                as $fleur){ ?>
            </tr>
            <tr>
                <td><?= $fleur['libelle'] ?></td>
                <td><?= $fleur['stock'] ?></td>
                <td><?= $fleur['raison_soc'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
<?php
require_once "footer.php";
?>