<?php

class BillDetail
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
                SELECT bd.id, b.name AS bill_name, bd.bill_detail, bd.amount, s.fullname, c.classroom_name AS classroom, s.nis, b.year, bd.status
                FROM bill_details bd
                JOIN student_classroom_bills scb on scb.id = bd.student_classroom_bills_id
                JOIN students s on s.id = scb.students_id
                JOIN classrooms c on c.id = scb.classrooms_id
                JOIN bills b on b.id = scb.bills_id
                ORDER BY bd.id DESC
        ");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}