<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$student = new Student(
    3,
    "Edi Maria Weirich",
    new DateTimeImmutable('1966-07-03')
);

$studentRepository = new PdoStudentRepository();

if ($studentRepository->save($student)) {
    echo "Aluno incluído.";
}
