<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class EmployeeController extends BaseController
{
    public function index()
    {
        // 1. แสดงรายชื่อแผนกทั้งหมด Department เรียงลำดับตามตัวอักษร
        $departments = DB::table('departments')->orderBy('dept_name')->get();

        // 2. แสดงรายชื่อพนักงานที่ขึ้นต้นด้วย ‘A’ และเป็นเพศชาย (50 คน)
        $maleEmployees = DB::table('employees')
            ->where('first_name', 'LIKE', 'A%')
            ->where('gender', 'M')
            ->orderBy('first_name', 'asc')
            ->take(50)
            ->get();

        // 3. แสดงรายชื่อพนักงานหญิงที่อายุมากกว่า 50 ปี (50 คน)
        $femaleEmployees = DB::table('employees')   //กำหนดตารางที่ต้องการดึงข้อมูลคือ 'employees'.
            ->selectRaw('*, YEAR(NOW()) - YEAR(birth_date) AS age')   //ใช้ฟังก์ชัน :ซีเลกลาว เพื่อดึงข้อมูลและคำนวณอายุของแต่ละพนักงานทั้งหมด
            ->whereRaw('YEAR(NOW()) - YEAR(birth_date) > 50')  //: ใช้เงื่อนไขของ แว เพื่อกรองเฉพาะพนักงานที่มีอายุมากกว่า 50 ปี. /เพิ่มเงื่อนไข WHERE เพื่อกรองเฉพาะพนักงานที่เป็นเพศหญิง ('F').
            ->where('gender', 'F')
            ->orderBy('first_name', 'asc')   //โอเดอบาย เรียงลำดับตามชื่อจริง จากน้อยไปมาก
            ->take(50
            )  //เทค จำกัดจำนวนอยู่ที่ 50 คน
            ->get(); //     ดึงข้อมูลจากฐานข้อมูลและคืนค่าเป็น Collection

        // ส่งข้อมูลไปยัง View โดยใช้ Inertia
        return Inertia::render('Employees/index', [
            'departments' => $departments,
            'maleEmployees' => $maleEmployees,
            'femaleEmployees' => $femaleEmployees,
        ]);
    }
}
