<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$stmt = $pdo->query('SELECT * FROM students;');

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($students as $student) {
    $studentList[] = new Student(
        $student['id'],
        $student['name'],
        new \DateTimeImmutable($student['birth_date'])
    );
}

var_dump($studentList);
