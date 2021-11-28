<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$databasePath");

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
