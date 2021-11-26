<?php

$pathDb = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$pathDb");

echo 'Coneectado!';

$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');
