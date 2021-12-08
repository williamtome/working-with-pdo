<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$studentRepository = new PdoStudentRepository();

$student = $studentRepository->find(2);

if ($studentRepository->remove($student)) {
    echo 'Aluno removido.';
}
