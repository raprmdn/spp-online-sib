<?php

class Student
{
    public $connection;

    public function __construct()
    {
        global $dbh;
        $this->connection = $dbh;
    }

    public function getAll()
    {
        $stmt = $this->connection->prepare("
                SELECT s.id, s.fullname, u.username, u.email, s.nis, c.classroom_name AS classroom, c.tahun_ajaran
                FROM students s
                LEFT JOIN users u on s.id = u.students_id
                LEFT JOIN students_classroom sc on s.id = sc.students_id
                LEFT JOIN classrooms c on c.id = sc.classroom_id
                WHERE c.tahun_ajaran = (
                        SELECT MAX(c2.tahun_ajaran)
                        FROM students s1
                            JOIN students_classroom sc2 on s1.id = sc2.students_id
                            JOIN classrooms c2 on c2.id = sc2.classroom_id
                        WHERE s1.id = s.id
                    )
                OR s.id NOT IN (SELECT students_id FROM students_classroom)
                ORDER BY c.classroom DESC
        ");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMyStudentProfile($id)
    {
        $stmt = $this->connection->prepare("
                SELECT s.*, c.classroom, c.classroom_name
                FROM students s
                JOIN students_classroom sc on sc.students_id = s.id
                JOIN classrooms c on c.id = sc.classroom_id
                WHERE s.id = :id
                ORDER BY sc.id DESC
                LIMIT 1
        ");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllStudentClassroom($id)
    {
        $stmt = $this->connection->prepare("
                SELECT c.*
                FROM classrooms c
                JOIN students_classroom sc on sc.classroom_id = c.id
                JOIN students s on s.id = sc.students_id
                WHERE s.id = :id
                ORDER BY c.id DESC;
        ");
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}