<?php
session_start();
require_once '../../config.php';
require_once '../models/Bill.php';
require_once '../helpers/Validate.php';

$bill = new Bill();

$id = $_POST['id'] ?? null;
$submit = $_POST['submit'] ?? null;

$name = htmlspecialchars($_POST['nama_tagihan'] ?? null);
$year = $_POST['tahun_tagihan'] ?? null;
$amount = $_POST['jumlah_tagihan'] ?? null;
$status = htmlspecialchars($_POST['status'] ?? null);

$attributes = [
    'nama_tagihan' => $name,
    'tahun_tagihan' => $year,
    'jumlah_tagihan' => $amount,
    'status' => $status,
];

if ($submit !== 'delete') {
    $_SESSION['error'] = Validate::billValidation($attributes);
}

if ($submit === 'create' && isset($_SESSION['error'])) {
    $_SESSION['error']['old'] = $attributes;
    header('Location: ../../dashboard.php?page=add-bill');
    exit;
} else if ($submit === 'update' && isset($_SESSION['error'])) {
    $_SESSION['error']['old'] = $attributes;
    header('Location: ../../dashboard.php?page=edit-bill&id=' . $id);
    exit;
}

switch ($submit) {
    case 'create':
        $bill->create($attributes);
        $_SESSION['alert'] = [
            'type' => 'success',
            'icon' => 'fas fa-check-circle',
            'message' => 'Bill successfully added.'
        ];
        break;
    case 'update':
        $attributes['id'] = $id;
        $bill->update($attributes);
        $_SESSION['alert'] = [
            'type' => 'success',
            'icon' => 'fas fa-check-circle',
            'message' => 'Bill successfully updated.'
        ];
        break;
    case 'delete':
        if ($bill->delete($id)) {
            $_SESSION['alert'] = [
                'type' => 'success',
                'icon' => 'fas fa-check-circle',
                'message' => 'Bill successfully deleted.'
            ];
        } else {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'icon' => 'fas fa-exclamation-circle',
                'message' => 'Bill failed to delete.'
            ];
        }
        break;
}

header('Location: ../../dashboard.php?page=bill-lists');

