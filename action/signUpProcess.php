<?php
require('../includes/config.php');
//pseudo mail password
if(!isset($_POST['pseudo'])||empty($_POST['pseudo'])) {
    header('location: index.php?msg=vous devez mettre un pseudo');
    exit;
}
if($_POST['pseudo'] != $_POST['pseudo2']) {
    header('location: index.php?msg=les pseudos ne correspondent pas');
    exit;
}
if($_POST['email'] != $_POST['email2']) {
    header('location: index.php?msg=les mails ne correspondent pas');
    exit;
}
if($_POST['password'] != $_POST['password2']) {
    header('location: index.php?msg=les mot de passe ne correspondent pas');
    exit;
}



?>