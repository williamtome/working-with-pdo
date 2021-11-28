<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$student = new Student(
    1,
    'Vinícius Dias',
    new DateTimeImmutable('1995-10-15')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

$row = $pdo->exec($sqlInsert);
var_dump($row);
