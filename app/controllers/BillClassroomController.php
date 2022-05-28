<?php
session_start();
require_once '../../config.php';
require_once '../models/Bill.php';
require_once '../models/Student.php';
require_once '../helpers/CreateBill.php';

$studentObj = new Student();

$billId = $_POST['bill_id'] ?? null;
$classroomIds = $_POST['classrooms'] ?? null;

$bill = new Bill();
$bill = $bill->getBillById($billId);

foreach ($classroomIds as $classroomId) {
    $students = $studentObj->findByClassroomId($classroomId);
    $studentIds = array_column($students, 'id');

    CreateBill::createBillDetail($studentIds, $bill, $classroomId);
}

$_SESSION['alert'] = [
    'type' => 'success',
    'icon' => 'fas fa-check-circle',
    'message' => 'Successfully added bill to classroom and related student.'
];

header('Location: ../../dashboard.php?page=bill-detail&id=' . $bill['id']);