<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

$connection->beginTransaction();
$repository = new PdoStudentRepository($connection);

$student = new Student(null, 'Nico Steppat', new DateTimeImmutable('1985-10-01'));
$repository->save($student);

$anotherStudent = new Student(null, 'Sérgio Lopes', new DateTimeImmutable('1985-10-01'));
$repository->save($anotherStudent);

//$connection->commit();
$connection->rollBack();
