<?php
$content = file_get_contents('.env');
$content = explode("\r\n", $content);
foreach ($content as $env) {
    putenv($env);
}

$host=getenv('DB_HOST');
$port=getenv('DB_PORT');
$dbname=getenv('DBNAME');

try {
    $bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",getenv('DB_USERNAME'),getenv('DB_PASSWORD'));
    $bdd->setAttribute( PDO::ERRMODE_WARNING,PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){
    die('Erreur'.$e->getMessage());}