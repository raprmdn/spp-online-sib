<?php
session_start();
require_once '../../config.php';
require_once '../models/StudentsClassroom.php';

$studentClassroom = new StudentsClassroom();

$studentIds= $_POST['students'] ?? null;
$classroomId = $_POST['classroom_id'] ?? null;

$studentClassroom->save($studentIds, $classroomId);
$_SESSION['alert'] = [
    'type' => 'success',
    'icon' => 'fas fa-check-circle',
    'message' => 'Students successfully added to classroom.'
];
header('Location: ../../dashboard.php?page=classroom-student-lists&id=' . $classroomId);