<?php

class User
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
                SELECT u.id, u.fullname, u.username, u.email, u.role, s.nis FROM users u
                LEFT JOIN students s on u.students_id = s.id");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fillInStudentId($id, $studentId)
    {
        $stmt = $this->connection->prepare("UPDATE users SET students_id = :students_id WHERE id = :id");
        $stmt->execute([
            'students_id' => $studentId,
            'id' => $id
        ]);
    }

    public function attempt($username, $password)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                unset($user['password']);
                return $user;
            }
        }

        return false;
    }

    public function register($attributes): void
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO users (fullname, username, password, email, role, status) 
                    VALUES (:fullname, :username, :password, :email, :role, :status)"
        );
        $stmt->execute([
            'fullname' => $attributes['fullname'],
            'username' => $attributes['username'],
            'password' => password_hash($attributes['password'], PASSWORD_DEFAULT),
            'email' => $attributes['email'],
            'role' => $attributes['role'],
            'status' => $attributes['status']
        ]);
    }

    public function existsUsername($username): bool
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return true;
        }

        return false;
    }

    public function existsEmail($email): bool
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return true;
        }

        return false;
    }
}