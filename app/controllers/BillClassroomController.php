<?php
session_start();
require_once '../../config.php';
require_once '../models/StudentClassroomBills.php';
require_once '../models/BillDetail.php';
require_once '../models/Bill.php';
require_once '../models/Student.php';

$studentClassroomBills = new StudentClassroomBills();
$billDetail = new BillDetail();
$studentObj = new Student();

$billId = $_POST['bill_id'] ?? null;
$classroomIds = $_POST['classrooms'] ?? null;

$bill = new Bill();
$bill = $bill->getBillById($billId);

$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

foreach ($classroomIds as $classroomId) {
    $students = $studentObj->findByClassroomId($classroomId);
    foreach ($students as $student) {
        $attributes = [
            'bills_id' => $billId,
            'classrooms_id' => $classroomId,
            'students_id' => $student['id']
        ];
        $id = $studentClassroomBills->create($attributes);

        for ($i = 0; $i < 12; $i++) {
            $attributes = [
                'student_classroom_bills_id' => $id,
                'bill_detail' => $months[$i] . ' ' . $bill['year'],
                'status' => 'UNPAID',
                'amount' => $bill['amount']
            ];
            $billDetail->create($attributes);
        }
    }
}

$_SESSION['alert'] = [
    'type' => 'success',
    'icon' => 'fas fa-check-circle',
    'message' => 'Successfully added bill to classroom and related student.'
];

header('Location: ../../dashboard.php?page=bill-detail&id=' . $bill['id']);