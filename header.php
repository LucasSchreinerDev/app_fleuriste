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
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>

        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">
<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="commande.php"><img src="logo.svg"></a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="commande.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-cart-arrow-down mr-3"></i>
            Commandes
        </a>
        <?php if ($user["grade"] >= 3){ ?>
            <a href="liste_employer.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="far fa-address-book mr-3"></i>
                Employé(e)s
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
        <div class="w-1/2"></div>
        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                <a href="logout.php" class="block px-4 py-2 account-link hover:text-white">Déconnexion</a>
            </div>
        </div>
    </header>
    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="commande.php"><img src="logo.svg"></a>
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
                    Employé(e)s
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


<!--    <b>Bienvenu ! --><?//= $user[1] ?><!--<br></b>-->
<!--    <b>Vous êtes --><?php
//        if (isset($admin)) {
//            echo $admin;
//        } else echo "Employée";
//        ?><!--</b>-->
