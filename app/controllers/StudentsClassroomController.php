<?php
session_start();
require_once '../../config.php';
require_once '../models/StudentsClassroom.php';
require_once '../models/Classroom.php';
require_once '../helpers/CreateBill.php';

$studentClassroom = new StudentsClassroom();
$classroom = new Classroom();
$billDetail = new BillDetail();
$studentClassroomBills = new StudentClassroomBills();

$studentIds= $_POST['students'] ?? null;
$classroomId = $_POST['classroom_id'] ?? null;

$studentClassroom->save($studentIds, $classroomId);
$bills = $classroom->getClassroomBill($classroomId);

if ($bills) {
    foreach ($bills as $bill) {
        CreateBill::createBillDetail($studentIds, $bill, $classroomId);
    }
}

$_SESSION['alert'] = [
    'type' => 'success',
    'icon' => 'fas fa-check-circle',
    'message' => 'Students successfully added to classroom.'
];

header('Location: ../../dashboard.php?page=classroom-student-lists&id=' . $classroomId);