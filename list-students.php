<?php

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$studentRepository = new PdoStudentRepository();

print_r($studentRepository->allStudents());
