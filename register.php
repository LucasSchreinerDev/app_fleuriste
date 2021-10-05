<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boite à fleurs</title>
    <link rel="icon" type="image/png" sizes="16x16" href="icone.png">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<main>
<!--    /*Pour le fonctionnement php allez voir add_commande_traitement, client update.php , database.php , add_employer.php et pour le css header.php plus*/-->

    <div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
         style="background-image: url(https://images.unsplash.com/photo-1623221638187-91bd42da2de6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1471&q=80);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="mt-2 items-center z-10">
            <div class="p-6">
                <img  class="object-cover h-20 w-full" src="logo_b.svg" alt="fleur">
            </div>
<form action="register-traitement.php" method="post"
      class="p-20 bg-white max-w-sm mx-auto rounded-xl shadow-xl overflow-hidden p-6 space-y-10">
    <div class="f-outline px-2 relative border rounded-lg focus-within:border-indigo-500">
        <input type="text" name="prenom" placeholder=" "
               class="block p-2 w-full text-m appearance-none focus:outline-none bg-transparent"/>
        <label for="prenom"
               class="absolute ml-5 top-0 text-m text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Prénom</label>
    </div>
    <div class="f-outline px-2 relative border rounded-m focus-within:border-indigo-500">
        <input type="text" name="nom" placeholder=" "
               class="block p-2 w-full text-m appearance-none focus:outline-none bg-transparent"/>
        <label for="nom"
               class="absolute ml-5 top-0 text-m text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Nom</label>
    </div>
    <div class="f-outline px-2 relative border rounded-m focus-within:border-indigo-500">
        <input type="text" name="tel" placeholder=" "
               class="block p-2 w-full text-m appearance-none focus:outline-none bg-transparent"/>
        <label for="tel"
               class="absolute ml-5 top-0 text-m text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Téléphone</label>
    </div>
    <div class="f-outline px-2 relative border rounded-m focus-within:border-indigo-500">
        <input type="email" name="email" placeholder=" "
               class="block p-2 w-full text-m appearance-none focus:outline-none bg-transparent"/>
        <label for="email"
               class="absolute ml-5 top-0 text-m text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Email</label>
    </div>
    <div class="f-outline px-2 relative border rounded-m focus-within:border-indigo-500">
        <input type="password" name="password" placeholder=" "
               class="block p-2 w-full text-m appearance-none focus:outline-none bg-transparent"/>
        <label for="password"
               class="absolute ml-5 top-0 text-m text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Mot de passe</label>
    </div>
    <div class="f-outline px-2 relative border rounded-m focus-within:border-indigo-500">
        <input type="password" name="confirm_password" placeholder=" "
               class="block p-2 w-full text-m appearance-none focus:outline-none bg-transparent"/>
        <label for="confirm_password"
               class="absolute ml-2 top-0 text-m text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Confirmer le mot de passe</label>
    </div>
    <button
            class="mb-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Envoyer
    </button>
    <button
            class="mb-2 ml-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded space-x-3">
        <a href="index.php">Retour</a>
    </button>
    </div>
</form>
</div>
</div>
<style>
    .f-outline input:focus-within ~ label,
    .f-outline input:not(:placeholder-shown) ~ label {
        transform: translateY(-1.5rem) translatex(-1rem) scaleX(0.80) scaleY(0.80);
    }
</style>
</div>
</main>
</html>
