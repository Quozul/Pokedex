<?php
include_once('../includes/config.php');

// user is connected
if (!isset($_SESSION['user_id'])) {
    header("location: /add_pokemon.php?msg=Vous devez être connectés pour effectuer cette action");
    exit;
}

// fields verif
if (empty($_POST['name']) || empty($_POST['hp']) || empty($_POST['attack']) || empty($_POST['defence']) || empty($_POST['speed'])) {
    header("location: /add_pokemon.php?msg=Veuillez renseigner tous les champs");
    exit;
}

// name verification
$request = $pdo->prepare('SELECT id FROM pokemon WHERE nom = ?');
$request->execute([$_POST['name']]);
if ($request->fetch()) {
    header("location: /add_pokemon.php?msg=Pokemon déjà ajouté");
    exit;
}

// image verification
$accept = [
    'image/jpeg',
    'image/jpg',
    'image/gif',
    'image/png'
];

// verify the file type
if (!in_array($_FILES['image']['type'], $accept)) {
    header("location: /add_pokemon.php?msg=L'image envoyée n'est pas valide");
    exit;
}

// limit image size to 1 MB
$maxsize = 1024 * 1024;
if ($_FILES['image']['size'] > $maxsize) {
    header("location: /add_pokemon.php?msg=L'image est trop volumineuse");
    exit;
}

$path = $_SERVER['DOCUMENT_ROOT'] . '/uploads';
if (!file_exists($path))
    mkdir($path, 0777, true);

$filename = time() . '_' . $_FILES['image']['name'];
$filepath = $path . '/' . $filename;
move_uploaded_file($_FILES['image']['tmp_name'], $filepath);

// add to db
$request = $pdo->prepare('INSERT INTO pokemon (nom, pv, attaque, defense, vitesse, image, id_user) VALUES (?, ?, ?, ?, ?, ?, ?)');
$request->execute([$_POST['name'], $_POST['hp'], $_POST['attack'], $_POST['defence'], $_POST['speed'], $filename, $_SESSION['user_id']]);

header('location: /profile.php');
