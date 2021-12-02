<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$statement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($statement->execute());
