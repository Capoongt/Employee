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
        $departments = DB::table('departemnts')->orderBy('dept_name')->get();

        // 2. แสดงรายชื่อพนักงานที่ขึ้นต้นด้วย ‘A’ และเป็นเพศชาย (50 คน)
        $maleEmployees = DB::table('employees')
            ->where('first_name', 'LIKE', 'A%')
            ->where('gender', 'M')
            ->orderBy('first_name', 'asc')
            ->take(50)
            ->get();

        // 3. แสดงรายชื่อพนักงานหญิงที่อายุมากกว่า 50 ปี (50 คน)
        $femaleEmployees = DB::table('employees')
            ->selectRaw('*, YEAR(NOW()) - YEAR(birth_date) AS age')
            ->whereRaw('YEAR(NOW()) - YEAR(birth_date) > 50')
            ->where('gender', 'F')
            ->orderBy('first_name', 'asc')
            ->take(50)
            ->get();

        // ส่งข้อมูลไปยัง View โดยใช้ Inertia
        return Inertia::render('Employees/index', [
            'departments' => $departments,
            'maleEmployees' => $maleEmployees,
            'femaleEmployees' => $femaleEmployees,
        ]);
    }
}
