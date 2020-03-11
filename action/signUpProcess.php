<?php
require('../includes/config.php');
///à retirer///
//echo $_POST['image'];
echo $_POST['pseudo'] . ' ';
echo $_POST['email'] . ' ';
echo $_POST['email2'] . ' ';
echo $_POST['password'] . ' ';
echo $_POST['password2'] . ' ';
//////////////
//pseudo mail password
//chek is the input was set
//check if the fomr was well complet
if(!isset($_POST['pseudo'])||empty($_POST['pseudo'])) {
    header('location: /index.php?msg=vous devez mettre un pseudo');
    exit;
}
if($_POST['pseudo'] != $_POST['pseudo2']) {
    header('location: /index.php?msg=les pseudos ne correspondent pas');
    exit;
}
if(!isset($_POST['email'])||empty($_POST['email'])) {
    header('location: /index.php?msg=vous devez mettre un email');
    exit;
}
if($_POST['email'] != $_POST['email2']) {
    header('location: /index.php?msg=les mails ne correspondent pas');
    exit;
}
if(!isset($_POST['password'])||empty($_POST['password'])) {
    header('location: /index.php?msg=vous devez mettre un mot de passe');
    exit;
}
if($_POST['password'] != $_POST['password2']) {
    header('location: /index.php?msg=les mot de passe ne correspondent pas');
    exit;
}
$passWord  = hash('sha256', $_POST['password']);
//array of image's type allowed
//$allowed = [
//    'image/jpeg',
//    'image/jpg',
//    'image/gif',
//    'image/png'
//];
//$_FILES['image']['type'];// catche the image object	
// if(!in_array($_FILES['image']['type'], $allowed)) {
//    header('location: index.php?msg=le fichier n\'est pas une image !');
//    exit;
//}
//check of iamga's weight
//$maxsize = 2048 * 2048;
//if($_FILES['image']['size'] > $maxsize) {
//    header('location: index.php?msg=le fichier est trop lourd');
//    exit;
//}
//$path = 'uploads';
//if(!file_exists($path)) {		// if de folder does not exist
//    mkdir($path,0777, true);	// creat it
//}
//$filename = $_FILES['image']['name'];
//$extension = end($temp);
//$timeStamp = time();
//$filename = 'image-' . $timeStamp . '.' . $extension;
//$way_image = $path . '/' . $filename;
//
//move_uploaded_file($_FILES['image']['tmp_name'], $chemin_image);// tmp_name est la position temporaire ou est stocker le fichier avec d'être stocker à sa place définitive.
$q = 'INSERT INTO user(pseudo, email, password) VALUE (:val1,:val2,:val3)';//ajouté image et :val4
$req = $bdd -> prepare($q);
$req->execute([
    "val1" => $_POST['pseudo'],
	"val2" => $_POST['email'],
    "val3" => $passWord,
   // "val4" => $way_image
]);
header('location: /index.php?msg=le fichier est trop lourd');
exit;
?>