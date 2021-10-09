<?php
session_start();
require_once 'database.php';
/*Dans chaque page sauf quelque une en cas d'erreur de redirection le header une session php pour sauvegarder l'utilisateur
/*Je recharge la base de données car j'en ai besoin pour récuperer mes diverses données
/*
  */
if (!isset($_SESSION['user'])) {
    header('Location:index.php?logg_err');
}
/* Si l'utilisateur n'est pas connection ( que il n'y a aucune session php je le redirige vers la page de connection*/
$sessionid = intval($_SESSION['user']);
/*Je cherche à qui appartient la session via une requête sql*/
$rank = $bdd->prepare("SELECT * from users where id = :session");
$rank->execute(array(
    'session' => $sessionid,
));
$user = $rank->fetch();
/*Si le grade est = à 3 admin sinon employer et 0 est égal à innactif quelqu'un qui vient de s'enregistrer et que l'adminstrateur doit le valider via employer_update.php*/
if ($user["grade"] >= 3) {
    $admin = "admin";
}else $admin = "employé"

/*
 * Pour le css j'utilise le framework Tailwind car je le trouve très simple d'utilisation par exemple MT = margin top BG-BLUE = Background color blue
 * ect, https://tailwindcss.com/docs
 * J'utilise aussi la police Bariol pour mes titres https://www.cufonfonts.com/font/bariol
 * J'ai utilisé Jimdo pour mon logo https://www.jimdo.com/fr/site-internet/logo-creator/
 * J'ai utilisé Font Awesome pour mes icones https://fontawesome.com/
 * Au niveau du Javascript mon header en contient très peu et j'utilise le framework Alpine js qui est un framework leger
 * qui est beaucoup utilise avec tailwind car il ce met directement dans les balises et simple d'utilisation dans mon cas
 * je l'ai utiliser pour le header quand il y'a X-show par exemple ou !open. https://tailwindcss.com/docs
 */
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icone.png">
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
<!--            Prenom utilisateur<-->
            <div class="md:invisible "> Bienvenue <?= $user["1"].'('.$admin.')'?> </div>


