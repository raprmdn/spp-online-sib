<?php
session_start();
require_once '../../config.php';
require_once '../models/BillDetail.php';

$billDetail = new BillDetail();

$id = $_POST['id'] ?? null;
$userParam = $_POST['user_param'] ?? null;
$page = $_POST['page'] ?? null;

$attributes = [
    'status' => 'PAID',
    'paid_at' => date("Y-m-d H:i:s"),
    'id' => $id
];

$billDetail->update($attributes);

$_SESSION['alert'] = [
    'type' => 'success',
    'icon' => 'fas fa-check-circle',
    'message' => 'Thanks, for completed the payment.'
];

if ($userParam) {
    header('Location: ../../dashboard.php?page=' . $page . '&id=' . $userParam);
} else {
    header('Location: ../../dashboard.php?page=' . $page);
}