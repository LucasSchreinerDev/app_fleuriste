<?php
require 'database.php';

if (!empty($_POST['firstname']) && isset($_POST['firstname']) && !empty($_POST['lastname']) && isset($_POST['lastname'])
    && !empty($_POST['phone']) && isset($_POST['phone']) && !empty($_POST['email']) && isset($_POST['email'])
    && !empty($_POST['address']) && isset($_POST['address']) && !empty($_POST['city']) && isset($_POST['city'])){

    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $phone = htmlentities($_POST['phone']);
    $email = htmlentities($_POST['email']);
    $address = htmlentities($_POST['address']);
    $city = htmlentities($_POST['city']);
    $cp=htmlentities($_POST['code_postal']);

    $check = $bdd->prepare('SELECT * FROM client WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    $email = strtolower($email);

    if($row == 0){
        if (strlen($firstname)<= 50){
        if (strlen($lastname)<= 50){
        if (strlen($phone)<= 14) {
            
                $insert = $bdd->prepare('INSERT INTO client(nom, prenom, telephone,email,adresse,ville,code_postal) VALUES(:nom, :prenom, :telephone,:email,:adresse,:ville, :cp)');
                $insert->execute(array(
                    'prenom' => $firstname,
                    'nom' => $lastname,
                    'email' => $email,
                    'telephone' => $phone,
                    'adresse'=> $address,
                    'ville' => $city,
                    'cp'=> $cp
                ));
                header('Location:commande.php?add_err=success');
            }else header('Location:client.php?add_err=mail');
          }else header('Location:client.php?add_err=phone');
         }else header('Location:client.php?add_err=lname');
        }else header('Location:client.php?add_err=fname');
      }else header('Location:client.php?add_err=findclient');
    }else header('Location:client.php?add_err=form');

