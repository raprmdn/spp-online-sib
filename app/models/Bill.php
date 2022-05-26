<?php

class Bill
{
    public $connection;

    public function __construct()
    {
        global $dbh;
        $this->connection = $dbh;
    }

    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM bills ORDER BY id DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBillById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM bills WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getClassroomByBill($id)
    {
        $stmt = $this->connection->prepare("
                SELECT c.id, b.name, c.classroom, c.classroom_name, c.tahun_ajaran, b.amount
                FROM classrooms c
                JOIN student_classroom_bills scb on scb.classrooms_id = c.id
                JOIN bills b on b.id = scb.bills_id
                WHERE scb.bills_id = :id
                GROUP BY c.id
        ");
        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($attributes): void
    {
        $stmt = $this->connection->prepare("INSERT INTO bills (name, year, amount, status) VALUES (:name, :year, :amount, :status)");
        $stmt->execute([
            'name' => $attributes['nama_tagihan'],
            'year' => $attributes['tahun_tagihan'],
            'amount' => $attributes['jumlah_tagihan'],
            'status' => $attributes['status']
        ]);
    }

    public function update($attributes): void
    {
        $stmt = $this->connection->prepare("UPDATE bills SET name = :name, year = :year, amount = :amount, status = :status WHERE id = :id");
        $stmt->execute([
            'name' => $attributes['nama_tagihan'],
            'year' => $attributes['tahun_tagihan'],
            'amount' => $attributes['jumlah_tagihan'],
            'status' => $attributes['status'],
            'id' => $attributes['id']
        ]);
    }

    public function delete($id): bool
    {
        if (!$this->hasRelatedToStudentClassroomBills($id)) {
            $stmt = $this->connection->prepare("DELETE FROM bills WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return true;
        }

        return false;
    }

    private function hasRelatedToStudentClassroomBills($id): bool
    {
        $stmt = $this->connection->prepare("SELECT * FROM student_classroom_bills WHERE bills_id = :id");
        $stmt->execute(['id' => $id]);
        $bill = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($bill) {
            return true;
        }

        return false;
    }
}