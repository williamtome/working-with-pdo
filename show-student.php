<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$databasePath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$stmt = $pdo->query('SELECT * FROM students WHERE id = 2;');

/**
 * NOTE: o fetchAll() consome muita meméria quando é usado
 * para retrrnar uma massa de dados muito grande.
 * Para casos assim é aconselhado usar o fetch dentro de
 * um while.
 */
while ($student = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $studentData = new Student(
        $student['id'],
        $student['name'],
        new \DateTimeImmutable($student['birth_date'])
    );

    echo $studentData->age() . PHP_EOL;
}
exit();
