<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=pokedex', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>