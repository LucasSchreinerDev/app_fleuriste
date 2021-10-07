<?php
session_start();
require_once 'database.php';

if (!isset($_SESSION['user'])) {
    header('Location:index.php?logg_err');
}

$sessionid = intval($_SESSION['user']);

$rank = $bdd->prepare("SELECT * from users where id = :session");
$rank->execute(array(
    'session' => $sessionid,
));
$user = $rank->fetch();

if ($user["grade"] >= 3) {
    $admin = "admin";
}else $admin = "employé";

    date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');

if ($user["grade"] < 3){
    header('Location:commande.php?grade=err');
}

if (!empty($_GET['historique']) && isset($_GET['historique'])) {
    $id = htmlentities($_GET['historique']);
    $select = $bdd->prepare('SELECT nom, prenom, telephone,email,adresse,ville FROM client WHERE id = :id');
    $select->execute(array(
        'id' => $id,
    ));
    $data = $select->fetch();
}
/*Pour le fonctionnement php allez voir add_commande_traitement , database.php , add_employer.php et pour le css header.php plus*/
$select = $bdd->prepare("SELECT num_commande, date_livraison, date_commande, adresse_livraison, commande_fleur.code_postal, client.nom, client.prenom, variete.libelle, couleur.libelle, commande_fleur.tel_contact, quantite, prix, users.firstname, users.surname 
                                 FROM commande
                                 INNER JOIN commande_fleur ON commande.num_commande = commande_fleur.id_commande 
                                 INNER JOIN client ON commande.id_client = client.id 
                                 INNER JOIN users ON commande.id_users = users.id    
                                 INNER JOIN fleur ON commande_fleur.id_fleur = fleur.id_fleur 
                                 INNER JOIN variete ON fleur.id_variete = variete.id 
                                 INNER JOIN couleur ON fleur.id_couleur = couleur.id 
                                 WHERE users.id = :id");
$select->execute(array(
    'id' => $id,
));
$commandes = $select->fetchAll();
$row = $select->rowCount();

if ($row === 0){
    header('Location:liste_employer.php?err=notcommande');
}
?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Boite à fleurs</title>
        <link rel="icon" type="image/png" sizes="16x16" href="assets/icone.png">
        <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
            @font-face { 	font-family: "title_font"; 	src: url('/Bariol.ttf'); }
            .font-family-karla { font-family: karla; }
            .bg-sidebar { background: #3d68ff; }
            .cta-btn { color: #3d68ff; }
            .upgrade-btn { background: #1947ee; }
            .upgrade-btn:hover { background: #0038fd; }
            .active-nav-link { background: #1947ee; }
            .nav-item:hover { background: #1947ee; }
            .account-link:hover { background: #3d68ff; }
            h1{
                font-family: title_font, serif;
            }
            .Bariol{
                font-family: title_font, serif;
        </style>
    </head>
<body class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="commande.php"><img src="assets/logo.svg"></a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="commande.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cart-arrow-down mr-3"></i>
                Commandes
            </a>
            <?php if ($user["grade"] >= 3){ ?>
                <a href="liste_employer.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="far fa-address-book mr-3"></i>
                    Employés
                </a><?php } ?>
            <a href="client.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-address-book mr-3"></i>
                Clients
            </a>
            <a href="fleurs.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-spa mr-3"></i>
                Fleurs
            </a>
            <a href="fournisseur.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-truck mr-3"></i>
                Fournisseurs
            </a>
        </nav>
    </aside>
<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        <div>
            Bienvenue <?= $user["1"].'('.$admin.')'?>
        </div>
        <div class="w-1/2"></div>
        <div class="relative w-1/2 flex justify-end">
            <a href="logout.php" class=" block px-4 py-2 account-link hover:text-white">Déconnexion</a>
        </div>
    </header>
    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="commande.php"><img src="assets/logo.svg"></a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>
        <!-- Dropdown Nav -->
        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
            <a href="commande.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cart-arrow-down mr-3"></i>
                Commandes
            </a>
            <?php if ($user["grade"] >= 3){ ?>
                <a href="liste_employer.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="far fa-address-book mr-3"></i>
                    Employés
                </a><?php } ?>
            <a href="client.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-address-book mr-3"></i>
                Clients
            </a>
            <a href="fleurs.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-spa mr-3"></i>
                Fleurs
            </a>
            <a href="fournisseur.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-truck mr-3"></i>
                Fournisseurs
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cogs mr-3"></i>
                Support
            </a>
            <a href="logout.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Déconnexion
            </a>
        </nav>
    </header>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
    <div class="md:invisible "> Bienvenue <?= $user["1"].'('.$admin.')'?> </div>
    <h1 class="text-3xl text-center mt-5 text-black pb-6">Commandes de l'employé</h1>
    <div class="w-full mt-12">
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="liste_employer.php">Retour</a>
    </button>
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse">
            <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Numéro de commande</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de livraison</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de commande</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Adresse de livraison</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom & prenom client</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Téléphone</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Quantité</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Total</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Detail fleurs</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Employé en charge</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($commandes as $commande) { ?>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"><?=  $commande[0] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?=$commande[1] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?=$commande[2] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[3]." ". $commande[4] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[6]." ".$commande[5] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[9]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $commande[10]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"> <?php $total = $commande[10] * $commande[11]; echo $total."€" ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"> <?= $commande[7]." ".$commande[8]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"> <?= $commande[12]." ".$commande[13]?></td>
                    <td><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="commande_del.php?del=<?=$commande[0]?>">Supprimer</a>
                        </button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php
require_once "footer.php";
?>