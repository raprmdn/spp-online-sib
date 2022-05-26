<?php
session_start();
require_once '../../config.php';
require_once '../models/Student.php';
require_once '../models/User.php';
require_once '../helpers/Validate.php';

$student = new Student();
$user = new User();

$authId = $_SESSION['user']['id'] ?? null;
$id = $_POST['id'] ?? null;
$submit = $_POST['submit'] ?? null;

$fullname = htmlspecialchars($_POST['nama_lengkap'] ?? null);
$gender = htmlspecialchars($_POST['jenis_kelamin'] ?? null);
$religion = htmlspecialchars($_POST['agama'] ?? null);
$birthplace = htmlspecialchars($_POST['tempat_lahir'] ?? null);
$birthdate = htmlspecialchars($_POST['tanggal_lahir'] ?? null);
$address = htmlspecialchars($_POST['alamat'] ?? null);
$phoneNumber = htmlspecialchars($_POST['no_hp'] ?? null);

$attributes = [
    'nama_lengkap' => $fullname,
    'jenis_kelamin' => $gender,
    'agama' => $religion,
    'tempat_lahir' => $birthplace,
    'tanggal_lahir' => $birthdate,
    'alamat' => $address,
    'no_hp' => $phoneNumber
];

$_SESSION['error'] = Validate::studentValidation($attributes);

if ($submit === 'create' && isset($_SESSION['error'])) {
    $_SESSION['error']['old'] = $attributes;
    header('Location: ../../dashboard.php?page=create-student');
    exit;
} else if ($submit === 'update' && isset($_SESSION['error'])) {
    $_SESSION['error']['old'] = $attributes;
    header('Location: ../../dashboard.php?page=profile-student-settings');
    exit;
}

switch ($submit) {
    case 'create':
        $attributes['status'] = 'ACTIVE';
        $attributes['nis'] = rand(1000000000, 9999999999);
        $studentId = $student->create($attributes);
        $user->fillInStudentId($authId, $studentId);
        $_SESSION['user']['students_id'] = $studentId;
        $_SESSION['alert'] = [
            'type' => 'success',
            'icon' => 'fas fa-check-circle',
            'message' => 'Student successfully added.'
        ];
        break;
    case 'update':
        $attributes['id'] = $id;
        $student->update($attributes);
        $_SESSION['alert'] = [
            'type' => 'success',
            'icon' => 'fas fa-check-circle',
            'message' => 'Student successfully updated.'
        ];
        break;
}

header('Location: ../../dashboard.php?page=profile-student-settings');