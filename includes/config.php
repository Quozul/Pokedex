<?php
try {
	$bdd = new PDO('mysql:host=localhost:3307;dbname=pokedex', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
