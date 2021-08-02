<?php
$content = file_get_contents('.env');
$content = explode("\n", $content);
foreach ($content as $env) {
    putenv($env);
}

$host=getenv('DB_HOST');
$port=getenv('DB_PORT');
$dbname=getenv('DBNAME');

try {
    $bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",eleve,"bonjour");
}

catch (PDOException $e){
    die('Erreur'.$e->getMessage());}