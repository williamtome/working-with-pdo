<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    "Carlos', ''); DROP TABLE students; -- da Silva",
    new DateTimeImmutable('1995-12-09')
);

$studentRepository = new PdoStudentRepository();

if ($studentRepository->save($student)) {
    echo "Aluno incluído.";
}
