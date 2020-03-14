<?php
try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=pokedex', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $e) {
    echo 'Database error!';
}

session_start();
