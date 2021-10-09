<?php
session_start();
require_once 'database.php';
/*Pour le fonctionnement php allez voir add_commande_traitement, client update.php , database.php , add_employer.php et pour le css header.php plus*/
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
}

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}

$sessionid = intval($_SESSION['user']);

$rank = $bdd->prepare("SELECT * from users where id = :session");
$rank->execute(array(
    'session' => $sessionid,
));
$user = $rank->fetch();

if ($user["grade"] >= 3) {
    $admin = "admin";

    $query = $bdd->prepare('SELECT id, firstname, surname, telephone, email, grade, active FROM users');
    $query->execute();
    $employers = $query->fetchAll();
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
            font-family: title_font, sans-serif;
        }
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
        Bienvenue <?= $user["1"].'('.$admin.')'?>
        <div class="w-1/2"></div>
        <div class="relative w-1/2 flex justify-end">
            <a href="logout.php" class="block px-4 py-2 account-link hover:text-white">Déconnexion</a>
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
            <?php if ($user["grade"] >= 3){ ?>
            <a href="liste_employer.php" class="flex items-center text-white opacity-75  py-2 pl-4 nav-item">
                <i class="fas fa-cart-arrow-down mr-3"></i>
                Employés
            </a><?php } ?>
            <a href="commande.php" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                <i class="fas fa-cart-arrow-down mr-3"></i>
                Commandes
            </a>
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
<div class="w-full mt-12">
    <h1 class="text-3xl text-center mt-5 text-black pb-6">Liste des employés</h1>
    <button class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="add_employer.php">Ajouter un employé</a>
    </button>
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse">
            <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Nom & prénom
                </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Mobile
                </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Email
                </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    statut
                </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    activité
                </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Historique
                </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Modifier
                </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Supprimer
                </th>
            </tr>
            </thead>
            <tbody>

                    <?php foreach ($employers as $employer){ ?>

                    <?php        if ($employer[5] == "3") {
                            $employer[5] = "admin";
                        }
                        if ($employer[5] == "1") {
                            $employer[5] = "employer";
                        }
                        if ($employer[5] == "0") {
                            $employer[5] = "inviter";
                        }

                        if ($employer[6] === "1") {
                            $statue = "actif";
                        }
                        if ($employer[6] === "0") {
                            $statue = "innactif";
                        }
                        if ($employer[6] === "2") {
                            $statue = "congé";
                        }
                        if ($employer[6] === "3") {
                            $statue = "vacance";
                        }
                        if ($employer[6] === "4") {
                            $statue = "arret maladie";
                        }

                        $employer_id = $employer[0];
                        { ?>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"><?= $employer[2]." ".$employer[1] ?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $employer[3]?> </td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $employer[4]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $employer[5]?></td>
                    <td class="py-4 px-6 border-b border-grey-light"><?= $statue ?></td>
                    <td>
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="employer_historique.php?historique=<?= $employer_id ?>">Historique</a>
                        </button>
                    </td>
                    <td>
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="employer_update.php?update=<?= $employer_id ?>.php">Modifier</a>
                        </button>
                    </td>
                    <td>
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="employer_del.php?del=<?= $employer_id ?>">Supprimer</a>
                        </button>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
    <?php
} else {
    header('Location:index.php?grade_err');
} ?>

</main>
<?php require 'footer.php' ?>

