<?php
session_start();
require_once 'database.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $chek = $bdd->prepare('SELECT * FROM users WHERE email=?');// a voir
    $chek->execute(array($email));
    $data = $chek->fetch();
    $row = $chek->rowCount();

    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (password_verify($password, $data['password'])) {
                if ($data['grade'] > 0) {
                    $_SESSION['user'] = $data['id'];
                    header('Location:commande.php');
                } else header('Location:index.php?loggin_err=grade');
            } else header('Location:index.php?loggin_err=password');
        } else header('Location:index.php?loggin_err=notvalid');
    } else header('Location:index.php?loggin_err=email');
} else  header('Location:index.php?loggin_err=emptyfield');

