<?php
require('../includes/config.php');
//chek is the input was set
if(!isset($_POST['nom'])||empty($_POST['nom'])) {
    header('location: index.php?msg=vous devez mettre un nom pour votre pokemon');
    exit;
}

if(!isset($_POST['pv'])||empty($_POST['pv'])) {
    header('location: index.php?msg=vous devez mettre des PV');
    exit;
}

if(!isset($_POST['att'])||empty($_POST['att'])) {
    header('location: index.php?msg=vous devez mettre une valeur d\'attaque');
    exit;
}
if(!isset($_POST['def'])||empty($_POST['def'])) {
    header('location: index.php?msg=vous devez mettre une valeur de defense');
    exit;
}
if(!isset($_POST['vit'])||empty($_POST['vit'])) {
    header('location: index.php?msg=vous devez mettre une valeur de vittesse');
    exit;
}
//////
$_SESSION[''];
//array of image's type allowed
$allowed = [
    'image/jpeg',
    'image/jpg',
    'image/gif',
    'image/png'
];
$_FILES['image']['type'];// catche the image object	
 if(!in_array($_FILES['image']['type'], $allowed)) {
    header('location: index.php?msg=le fichier n\'est pas une image !');
    exit;
}
//check of iamga's weight
$maxsize = 2048 * 2048;
if($_FILES['image']['size'] > $maxsize) {
    header('location: index.php?msg=le fichier est trop lourd');
    exit;
}
$path = 'uploads';
if(!file_exists($path)) {		// if de folder does not exist
    mkdir($path,0777, true);	// creat it
}
$filename = $_FILES['image']['name'];
$extension = end($temp);
$timeStamp = time();
$filename = 'image-' . $timeStamp . '.' . $extension;
$way_image = $path . '/' . $filename;
//
move_uploaded_file($_FILES['image']['tmp_name'], $chemin_image);// tmp_name est la position temporaire ou est stocker le fichier avec d'être stocker à sa place définitive.
$q = 'INSERT INTO pokemon(nom, pv, attaque, defense, vitesse, image) VALUE (:val1,:val2,:val3,:val4)';
$req = $bdd -> prepare($q);
$req->execute([
    "val1" => $_POST['pseudo'],
	"val2" => $_POST['email'],
    "val3" => $passWord,
    "val4" => $way_image
]);
//header('location: index.php?msg=le fichier est trop lourd');
//exit;
echo 'ok';
?>