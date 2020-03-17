<?php
include_once('../includes/config.php');

if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm-password'])) {
    header("location: /connexion.php?msg=Veuillez renseigner tous les champs");
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("location: /connexion.php?msg=L'adresse mail n'a pas un format valide");
    exit;
}

// check if username and email isn't already used
$request = $pdo->prepare('SELECT email, pseudo FROM user WHERE email = ? OR pseudo = ?');
$request->execute([$_POST['email'], $_POST['username']]);
$result = $request->fetchAll();

if (count($result) != 0) {
    header("location: /connexion.php?msg=Nom d'utilisateur ou adresse mail déjà utilisés");
    exit;
}

if ($_POST['password'] !== $_POST['confirm-password']) {
    header("location: /connexion.php?msg=Le mot de passe et sa confirmation ne correspondent pas");
    exit;
}

// verify password length
$pass_len = strlen($_POST['password']);
if (8 > $pass_len || !preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/', $_POST['password'])) {
    header("location: /connexion.php?msg=Le mot de passe doit contenir un chiffre, une minuscule , une majuscule et faire 8 caractère au moins");
    exit;
}

$accept = [
    'image/jpeg',
    'image/jpg',
    'image/gif',
    'image/png'
];

// verify the file type
if (!in_array($_FILES['image']['type'], $accept)) {
    header("location: /connexion.php?msg=L'image de profil envoyée n'est pas valide");
    exit;
}

// limit image size to 1 MB
$maxsize = 1024 * 1024;
if ($_FILES['image']['size'] > $maxsize) {
    header("location: /connexion.php?msg=L'image de profil est trop volumineuse");
    exit;
}

$path = $_SERVER['DOCUMENT_ROOT'] . '/uploads';
if (!file_exists($path))
    mkdir($path, 0777, true);

$filename = time() . '_' . $_FILES['image']['name'];
$filepath = $path . '/' . $filename;
move_uploaded_file($_FILES['image']['tmp_name'], $filepath);

$request = $pdo->prepare('INSERT INTO user (pseudo, email, password, image) VALUES (?, ?, ?, ?)');
$request->execute([$_POST['username'], $_POST['email'], hash('sha256', $_POST['password']), $filename]);

header("location: /connexion.php?msg=Compte correctement créé");
