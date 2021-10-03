<?php
require 'database.php';
/*Chargement du fichier avec l'objet PDO pour l'accès au connées*/
if (!empty($_POST["date_livraison"]) && !empty($_POST["adresse"]) && !empty($_POST["city"])
    && !empty($_POST["cp"]) && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["quantity"]) && !empty($_POST["fleur_detail"]) && !empty($_POST["client"]) && !empty($_POST["id_employer"]) && !empty($_POST["mobile"])) {
    /* je recupère tout mes données des formulaires si ils ne sont pas vide sinon je les redirige vers la liste des commandes*/
    $date_commande = date("Y-m-d H:i:s");
    $date_livraison = htmlentities($_POST['date_livraison']);
    $adresse = htmlentities($_POST['adresse']);
    $city = htmlentities($_POST['city']);
    $cp = htmlentities($_POST['cp']);
    $cp = intval($cp);
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $quantity = htmlentities($_POST['quantity']);
    $quantity = intval($quantity);
    $fleurETfournisseur = htmlentities($_POST['fleur_detail']);
    $fleurETfournisseur = explode("a", $fleurETfournisseur);
    $fleur = $fleurETfournisseur[0];
    $fleur = intval($fleur);
    $fournisseur = $fleurETfournisseur[1];
    $fournisseur = intval($fournisseur);
    $client = htmlentities($_POST['client']);
    $client = intval($client);
    $employer = htmlentities($_POST["id_employer"]);
    $employer = intval($employer);
    $mobile = htmlentities($_POST['mobile']);
    $mobile = intval($mobile);
    /* htmlentitities contre les failles xss et injection sql */
    /*je verifie que certain input sont bien des chiffres comme le code postal ou le numéro de téléphone */
    if (is_numeric($cp) && is_numeric($quantity) && is_numeric($fleur) && is_numeric($fournisseur) && is_numeric($client) && is_numeric($employer) && is_numeric($mobile)) {

        /* je prepare une requête sql pour avoir selectionner les données des stocks et je joins les tables avec les INNER JOIN pour récuperer les données de plusieurs table en même temps */

        $query = $bdd->prepare('SELECT fleur_fournisseur.stock FROM fleur_fournisseur 
                                  INNER JOIN fournisseur ON fleur_fournisseur.id_fournisseur = fournisseur.id  
                                  WHERE id_fleur = :id_fleur AND fournisseur.id = :fournisseur_id');
        $query->execute(array(
            "id_fleur" => $fleur,
            "fournisseur_id" => $fournisseur,
        ));
        $data = $query->fetch();
        $stock_fleur = intval($data[0]);
       /* si la valeur de l'input quantité que le client a completer est supérieur au stock ça le redirige vers les commandes avec toujours un messages d'erreur en GET */
        if ($stock_fleur < $quantity) {
            header('Location:add_commande.php?add_err=quantity');
        }
       /* La requête de l'insertion dans le table commandes et commandes fleurs se prépare et s'éxecute avec sécuriter  */
        $insertCommande = $bdd->prepare("INSERT INTO commande(id_client, id_users, date_commande) VALUES(:id_client, :id_users, :date_commande)");
        $insertCommande->execute(array(
            "id_client" => $client,
            "id_users" => $employer,
            "date_commande" => $date_commande,
        ));
        /*il y'a 2 table ou il faut insérer en une seul requête car on ne peut pas faire deux formulaire different */
        $verification_commande = $bdd->prepare("SELECT num_commande FROM commande WHERE id_client = :id_client AND id_users = :id_users AND date_commande = :date_commande ");
        $verification_commande->execute(array(
            "id_client" => $client,
            "id_users" => $employer,
            "date_commande" => $date_commande,
        ));
        $id_commande = $verification_commande->fetch();
        if ($id_commande) {
            $insert_commande_fleur = $bdd->prepare('INSERT INTO commande_fleur(id_commande, id_fleur, tel_contact, date_livraison, adresse_livraison, code_postal, ville, quantite) 
                                                  VALUES (:id_commande, :id_fleur, :tel_contact, :date_livraison, :adresse_livraison, :code_postal, :ville, :quantite)');
            $insert_commande_fleur->execute(array(
                "id_commande" => $id_commande[0],
                "id_fleur" => $fleur,
                "tel_contact" => $mobile,
                "date_livraison" => $date_livraison,
                "adresse_livraison" => $adresse,
                "code_postal" => $cp,
                "ville" => $city,
                "quantite" => $quantity,
            ));

            $update_stock = $bdd->prepare('UPDATE fleur_fournisseur SET stock = stock - :stock WHERE id_fournisseur = :id_fournisseur AND id_fleur = :id_fleur');
            $update_stock->execute(array(
                "stock" => $quantity,
                "id_fournisseur" => $fournisseur,
                "id_fleur" => $fleur,
            ));
            header('Location:commande.php?add=success');
        }
    /* Redirection en cas d'erreur*/
    } else {
        header("Location:add_commande.php?add_err=emptyfield");
    }
} else {
    header('Location:add_commande.php?add_err=numeric');
}