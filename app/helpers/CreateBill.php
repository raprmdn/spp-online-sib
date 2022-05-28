<?php
require_once '../models/BillDetail.php';
require_once '../models/StudentClassroomBills.php';

class CreateBill
{
    public static function createBillDetail($studentIds, $bill, $classroomId)
    {
        $billDetail = new BillDetail();
        $studentClassroomBills = new StudentClassroomBills();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        foreach ($studentIds as $studentId) {
            $attributes = [
                'bills_id' => $bill['id'],
                'classrooms_id' => $classroomId,
                'students_id' => $studentId
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
}