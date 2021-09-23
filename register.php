<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <title>Document</title>
</head>
<body>
<header></header>
<main>
    <form action="register-traitement.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom">
        <label for="nom">Nom</label>
        <input type="tel" name="nom">
        <label for="text">Mobile</label>
        <input type="text" name="tel">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
        <label for="password">Confirmer mot de passe</label>
        <input type="password" name="confirm_password">
        <input type="submit">
    </form>
    <a href="index.php">Retour</a>
</main>
<footer>
</footer>
</body>
</html>