<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$student = new Student(
    1,
    "Vinícius', ''); DROP TABLE students; -- Dias",
    new DateTimeImmutable('1995-10-15')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo "Aluno incluído.";
    exit();
}
echo "Erro ao incluir aluno.";
