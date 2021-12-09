<?php

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$studentRepository = new PdoStudentRepository($pdo);

$student = $studentRepository->find(2);

if ($studentRepository->remove($student)) {
    echo 'Aluno removido.';
}
