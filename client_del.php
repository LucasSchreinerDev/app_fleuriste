<?php
require 'database.php';
if (isset($_GET['del'])) {
    $id=htmlspecialchars($_GET['del']);
    $ids=intval($id);
    $delete = $bdd->prepare("DELETE FROM `client` WHERE id=$ids");
    $delete->execute(array());
    header('Location:client.php');
}