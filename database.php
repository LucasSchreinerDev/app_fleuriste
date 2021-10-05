<?php
$content = file_get_contents('.env');
$content = explode("\r\n", $content);
/* \n pour linux \r pour windows car sinon risque de problème*/
foreach ($content as $env) {
    putenv($env);
}
/*Pour ne pas versionner sur git mes codes d'accès ils sont dans un fichier .env qui n'est pas versionner*/
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$dbname = getenv('DBNAME');
/*J'utilise des variables d'environnement pour acceder au données*/
try {
    $bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    $bdd->setAttribute(PDO::ERRMODE_WARNING, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur' . $e->getMessage());
}
/*à l'aide d'un try and catch je test si je peut me connecter grâce à l'objet pdo et si il y'a une erreur je l'attrape et l'affiche avec la methode getMessage*/
