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
                SELECT s.id, s.fullname, u.username, u.email, s.nis, s.gender, c.classroom_name AS classroom, c.tahun_ajaran
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

    public function findAll()
    {
        $stmt = $this->connection->prepare("
                SELECT s.*, c.classroom_name AS classroom, c.tahun_ajaran
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

    public function getStudentProfile($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getMyStudentProfileWithClassroom($id)
    {
        $stmt = $this->connection->prepare("
                SELECT s.*, c.classroom, c.classroom_name
                FROM students s
                LEFT JOIN students_classroom sc on sc.students_id = s.id
                LEFT JOIN classrooms c on c.id = sc.classroom_id
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

    public function getStudentBills($id)
    {
        $stmt = $this->connection->prepare("
                SELECT bd.id, b.name AS bill_name, bd.bill_detail, bd.amount, s.fullname, c.classroom_name AS classroom, s.nis, b.year, bd.status, bd.paid_at
                FROM bill_details bd
                JOIN student_classroom_bills scb on scb.id = bd.student_classroom_bills_id
                JOIN students s on s.id = scb.students_id
                JOIN classrooms c on c.id = scb.classrooms_id
                JOIN bills b on b.id = scb.bills_id
                WHERE s.id = :id
                ORDER BY bd.id DESC
        ");
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByClassroomId($id)
    {
        $stmt = $this->connection->prepare("
                SELECT s.*
                FROM students s
                JOIN students_classroom sc on s.id = sc.students_id
                JOIN classrooms c on c.id = sc.classroom_id
                WHERE c.id = :id
        ");
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($attributes)
    {
        $stmt = $this->connection->prepare("
                INSERT INTO students (fullname, nis, gender, religion, birthplace, birthdate, address, phone_number, status)
                VALUES (:fullname, :nis, :gender, :religion, :birthplace, :birthdate, :address, :phone_number, :status)
        ");
        $stmt->execute([
            'fullname' => $attributes['nama_lengkap'],
            'nis' => $attributes['nis'],
            'gender' => $attributes['jenis_kelamin'],
            'religion' => $attributes['agama'],
            'birthplace' => $attributes['tempat_lahir'],
            'birthdate' => $attributes['tanggal_lahir'],
            'address' => $attributes['alamat'],
            'phone_number' => $attributes['no_hp'],
            'status' => $attributes['status']
        ]);

        return $this->connection->lastInsertId();
    }

    public function update($attributes): void
    {
        $stmt = $this->connection->prepare("UPDATE students SET fullname = :fullname, gender = :gender, religion = :religion, 
                    birthplace = :birthplace, birthdate = :birthdate, address = :address, phone_number = :phone_number WHERE id = :id");
        $stmt->execute([
            'fullname' => $attributes['nama_lengkap'],
            'gender' => $attributes['jenis_kelamin'],
            'religion' => $attributes['agama'],
            'birthplace' => $attributes['tempat_lahir'],
            'birthdate' => $attributes['tanggal_lahir'],
            'address' => $attributes['alamat'],
            'phone_number' => $attributes['no_hp'],
            'id' => $attributes['id'],
        ]);
    }
}