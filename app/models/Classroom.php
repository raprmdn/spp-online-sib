<?php

class Classroom
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
            SELECT c.*, COUNT(s.id) AS students_count
            FROM classrooms c
            LEFT JOIN students_classroom sc on sc.classroom_id = c.id
            LEFT JOIN students s on s.id = sc.students_id
            GROUP BY c.id
            ORDER BY c.id DESC;
        ");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClassroomById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM classrooms WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudentByClassroom($id)
    {
        $stmt = $this->connection->prepare("
            SELECT s.*, c.classroom_name AS classroom, c.tahun_ajaran
            FROM students s
            JOIN students_classroom sc on sc.students_id = s.id
            JOIN classrooms c on c.id = sc.classroom_id
            WHERE c.id = :id"
        );
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($attributes): void
    {
        $stmt = $this->connection->prepare("
                INSERT INTO classrooms (classroom, classroom_name, status, tahun_ajaran) 
                VALUES (:classroom, :classroom_name, :status, :tahun_ajaran)"
        );
        $stmt->execute([
            'classroom' => $attributes['kelas'],
            'classroom_name' => $attributes['nama_kelas'],
            'status' => $attributes['status'],
            'tahun_ajaran' => $attributes['tahun']
        ]);
    }

    public function update($attributes): void
    {
        $stmt = $this->connection->prepare("
                UPDATE classrooms SET classroom = :classroom, classroom_name = :classroom_name, status = :status, tahun_ajaran = :tahun_ajaran WHERE id = :id"
        );
        $stmt->execute([
            'classroom' => $attributes['kelas'],
            'classroom_name' => $attributes['nama_kelas'],
            'status' => $attributes['status'],
            'tahun_ajaran' => $attributes['tahun'],
            'id' => $attributes['id']
        ]);
    }

    public function delete($id): bool
    {
        if (!$this->hasRelatedToStudentsClassroom($id) && !$this->hasRelatedToStudentClassroomBills($id)) {
            $stmt = $this->connection->prepare("DELETE FROM classrooms WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return true;
        }

        return false;
    }

    private function hasRelatedToStudentsClassroom($id): bool
    {
        $stmt = $this->connection->prepare("SELECT * FROM students_classroom WHERE classroom_id = :id");
        $stmt->execute(['id' => $id]);
        $classroom = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($classroom) {
            return true;
        }

        return false;
    }

    private function hasRelatedToStudentClassroomBills($id): bool
    {
        $stmt = $this->connection->prepare("SELECT * FROM student_classroom_bills WHERE classrooms_id = :id");
        $stmt->execute(['id' => $id]);
        $classroom = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($classroom) {
            return true;
        }

        return false;
    }
}