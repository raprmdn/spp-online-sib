<?php

class StudentsClassroom
{
    public $connection;

    public function __construct()
    {
        global $dbh;
        $this->connection = $dbh;
    }

    public function save($studentIds, $classroomId): void
    {
        $stmt = $this->connection->prepare("
            INSERT IGNORE INTO students_classroom (students_id, classroom_id)
            VALUES (:students_id, :classroom_id)
        ");
        foreach ($studentIds as $studentId) {
            $stmt->execute([
                'students_id' => $studentId,
                'classroom_id' => $classroomId
            ]);
        }
    }
}