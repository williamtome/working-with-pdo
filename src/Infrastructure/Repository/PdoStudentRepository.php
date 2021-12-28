<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use DateTimeImmutable;
use PDO;
use PDOStatement;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;
    private PDOStatement $statement;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {
        $this->statement = $this->connection->query('SELECT * FROM students;');

        return $this->hydrateStudentList($this->statement);
    }

    public function studentBirthAt(\DateTimeInterface $birthDate): array
    {
        $selectQuery = "SELECT * FROM students WHERE birth_date = ?;";
        $this->statement = $this->connection->query($selectQuery);
        $this->statement->bindValue(1, $birthDate->format('Y-m-d'));
        $this->statement->execute();

        return $this->hydrateStudentList($this->statement);
    }

    public function find(int $id): ?Student
    {
        $selectStudentQuery = 'SELECT * FROM students WHERE id = ?;';
        $this->statement = $this->connection->prepare($selectStudentQuery);
        $this->statement->bindValue(1, $id, PDO::PARAM_INT);
        $this->statement->execute();

        $studentList = $this->hydrateStudentList($this->statement);

        return count($studentList) === 1 ? array_shift($studentList) : null;
    }

    private function hydrateStudentList(PDOStatement $statement): array
    {
        $studentDataList = $statement->fetchAll();
        $studentList = [];

        foreach ($studentDataList as $studentData) {
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new DateTimeImmutable($studentData['birth_date'])
            );
        }

        return $studentList;
    }

    public function save(Student $student): bool
    {
        if ($student->id() === null) {
            return $this->insert($student);
        }

        return $this->update($student);
    }

    private function insert(Student $student): bool
    {
        $insertQuery = 'INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);';
        $this->statement = $this->connection->prepare($insertQuery);

        $success = $this->statement->execute([
            ':name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d')
        ]);

        if ($success) {
            $student->defineId($this->connection->lastInsertId());
        }

        return $success;
    }

    private function update(Student $student): bool
    {
        $updateQuery = 'UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id;';
        $this->statement = $this->connection->prepare($updateQuery);
        $this->statement->bindValue(':name', $student->name());
        $this->statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        $this->statement->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $this->statement->execute();
    }

    public function remove(?Student $student): bool
    {
        if (is_null($student)) {
            return false;
        }

        $this->statement = $this->connection->prepare('DELETE FROM students WHERE id = :id;');
        $this->statement->bindValue(1, $student->id(), PDO::PARAM_INT);

        return $this->statement->execute();
    }

    public function studentsWithPhones(): array
    {
        $sqlQuery = '
            SELECT students.id,
                   students.name,
                   students.birth_date,
                   phones.id AS phone_id,
                   phones.area_code,
                   phones.number
              FROM students
               JOIN phones
                ON students.id = phones.student_id;
        ';

        $this->statement = $this->connection->query($sqlQuery);
        $studentList = [];

        foreach ($this->statement->fetchAll() as $row) {
            if (!array_key_exists($row['id'], $studentList)) {
                $studentList[$row['id']] = new Student($row['id'], $row['name'], new DateTimeImmutable($row['birth_date']));
            }
            $phone = new Phone($row['phone_id'], $row['area_code'], $row['number']);
            $studentList[$row['id']]->addPhone($phone);
        }

        return $studentList;
    }
}
