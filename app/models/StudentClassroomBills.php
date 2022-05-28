<?php

class StudentClassroomBills
{
    public $connection;

    public function __construct()
    {
        global $dbh;
        $this->connection = $dbh;
    }

    public function create($attributes)
    {
        $stmt = $this->connection->prepare("
                INSERT INTO student_classroom_bills (bills_id, classrooms_id, students_id) 
                VALUES (:bills_id, :classrooms_id, :students_id)"
        );
        $stmt->execute([
            'bills_id' => $attributes['bills_id'],
            'classrooms_id' => $attributes['classrooms_id'],
            'students_id' => $attributes['students_id']
        ]);

        return $this->connection->lastInsertId();
    }
}