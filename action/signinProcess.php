<?php
require('../includes/config.php');
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = hash('sha256', $_POST['password']);
    $q = 'SELECT id FROM user WHERE pseudo = ? AND password = ?';
    $req = $bdd->prepare($q);
    $req->execute([$pseudo, $password]);
    $results = $req->fetchAll();
    if(count($result) == 0) {
        header('location:signin.php?msg=Identifiants incorrects');
        exit;
    } else {
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        header('location:index.php');
        exit;
    }
?>