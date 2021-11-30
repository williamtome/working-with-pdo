<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$statement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$statement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($statement->execute());
