<?php
include_once('../includes/config.php');
$request = $pdo->prepare('SELECT id FROM user WHERE email = ? AND password = ?');
$request->execute([$_POST['email'], hash('sha256', $_POST['password'])]);
$result = $request->fetch();

if (!$result) {
    header("location: /connexion.php?msg=Vérifier l'email et le mot de passe");
    exit;
} else {
    $_SESSION['user_id'] = $result[0];
    header('location: /');
}
