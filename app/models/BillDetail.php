<?php

class BillDetail
{
    public $connection;

    public function __construct()
    {
        global $dbh;
        $this->connection = $dbh;
    }

    public function getAllPaginate($offset, $limit)
    {
        $stmt = $this->connection->prepare("
                SELECT bd.id, b.name AS bill_name, bd.bill_detail, bd.amount, s.fullname, c.classroom_name AS classroom, s.nis, b.year, bd.status, bd.paid_at
                FROM bill_details bd
                JOIN student_classroom_bills scb on scb.id = bd.student_classroom_bills_id
                JOIN students s on s.id = scb.students_id
                JOIN classrooms c on c.id = scb.classrooms_id
                JOIN bills b on b.id = scb.bills_id
                ORDER BY bd.id DESC
                LIMIT :offset, :limit
        ");
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM bill_details");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function create($attributes)
    {
        $stmt = $this->connection->prepare("
                INSERT INTO bill_details (student_classroom_bills_id, bill_detail, status, amount) 
                VALUES (:student_classroom_bills_id, :bill_detail, :status, :amount)"
        );
        $stmt->execute([
            'student_classroom_bills_id' => $attributes['student_classroom_bills_id'],
            'bill_detail' => $attributes['bill_detail'],
            'amount' => $attributes['amount'],
            'status' => $attributes['status']
        ]);
    }

    public function update($attributes): void
    {
        $stmt = $this->connection->prepare("UPDATE bill_details SET status = :status, paid_at = :paid_at WHERE id = :id");
        $stmt->execute([
            'status' => $attributes['status'],
            'paid_at' => $attributes['paid_at'],
            'id' => $attributes['id']
        ]);
    }
}