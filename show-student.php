<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

$studentRepository = new PdoStudentRepository();

print_r($studentRepository->studentBirthAt(
    new DateTimeImmutable('1966-07-03')
));
