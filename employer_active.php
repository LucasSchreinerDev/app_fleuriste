<?php
session_start();
require_once 'database.php';

if (isset($_SESSION['user'])) {


    $sessionid = intval($_SESSION['user']);

    $rank = $bdd->prepare("SELECT * from users where id = :session");
    $rank->execute(array(
        'session' => $sessionid,
    ));
    $user = $rank->fetch();

    if ($user["grade"] >= 3) {
        $admin = "admin";
        if (isset($_GET['del_err'])) {
            $id = htmlspecialchars($_GET['del_err']);
            $ids = intval($id);
            $delete = $bdd->prepare("UPDATE users SET active = :grade WHERE id=$ids");
            $delete->execute(array(
                "grade" => 0,
            ));
            header('Location:liste_employer.php');
        } else echo "noob";
    } else header('Location:liste_employer.php');
}else header("Location:index.php");