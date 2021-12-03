<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use DateTimeImmutable;
use PDO;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionCreator::createConnection();
    }

    public function allStudents(): array
    {
        $statement = $this->connection->query('SELECT * FROM students;');

        $students = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->getStudents($students);
    }

    public function studentBirthAt(\DateTimeInterface $birthDate): array
    {
        // TODO: Implement studentBirthAt() method.
    }

    public function save(Student $student): bool
    {
        // TODO: Implement save() method.
    }

    public function remove(Student $student): bool
    {
        // TODO: Implement remove() method.
    }

    /**
     * @throws \Exception
     */
    private function getStudents(array $students): array
    {
        $studentList = [];

        foreach ($students as $student) {
            $studentList[] = new Student(
                $student['id'],
                $student['name'],
                new DateTimeImmutable($student['birth_date'])
            );
        }

        return $studentList;
    }
}
