<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pathDb = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$pathDb");

$student = new Student(
    null,
    'William Tomé',
    new DateTimeImmutable('1988-04-30')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

$row = $pdo->exec($sqlInsert);
var_dump($row);
