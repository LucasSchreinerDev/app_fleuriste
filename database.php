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
    $bdd = new PDO("mysql:host=localhost;port=$port;dbname=fleuriste;charset=utf8","root","");
}

catch (PDOException $e){
    die('Erreur'.$e->getMessage());}