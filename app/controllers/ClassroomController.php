<?php
session_start();
require_once '../../config.php';
require_once '../models/Classroom.php';
require_once '../helpers/Validate.php';

$classroom = new Classroom();

$id = $_POST['id'] ?? null;
$submit = $_POST['submit'] ?? null;

$kelas = $_POST['kelas'] ?? null;
$namaKelas = htmlspecialchars($_POST['nama_kelas'] ?? null);
$tahun = $_POST['tahun'] ?? null;
$status = htmlspecialchars($_POST['status'] ?? null);

$attributes = [
    'kelas' => $kelas,
    'nama_kelas' => $namaKelas,
    'tahun' => $tahun,
    'status' => $status,
];

if ($submit !== 'delete') {
    $_SESSION['error'] = Validate::classroomValidation($attributes);
}

if ($submit === 'create' && isset($_SESSION['error'])) {
    $_SESSION['error']['old'] = $attributes;
    header('Location: ../../dashboard.php?page=add-classroom');
    exit;
} else if ($submit === 'update' && isset($_SESSION['error'])) {
    $_SESSION['error']['old'] = $attributes;
    header('Location: ../../dashboard.php?page=edit-classroom&id=' . $id);
    exit;
}

switch ($submit) {
    case 'create':
        $classroom->create($attributes);
        $_SESSION['alert'] = [
            'type' => 'success',
            'icon' => 'fas fa-check-circle',
            'message' => 'Classroom successfully added.'
        ];
        break;
    case 'update':
        $attributes['id'] = $id;
        $classroom->update($attributes);
        $_SESSION['alert'] = [
            'type' => 'success',
            'icon' => 'fas fa-check-circle',
            'message' => 'Classroom successfully updated.'
        ];
        break;
    case 'delete':
        if ($classroom->delete($id)) {
            $_SESSION['alert'] = [
                'type' => 'success',
                'icon' => 'fas fa-check-circle',
                'message' => 'Classroom successfully deleted.'
            ];
        } else {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'icon' => 'fas fa-exclamation-circle',
                'message' => 'Classroom failed to delete.'
            ];
        }
        break;
}

header('Location: ../../dashboard.php?page=classroom-lists');



