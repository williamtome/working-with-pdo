<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

$databasePath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$studentRepository = new PdoStudentRepository($pdo);

print_r($studentRepository->studentBirthAt(
    new DateTimeImmutable('1966-07-03')
));
