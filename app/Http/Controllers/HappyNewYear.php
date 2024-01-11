<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class HappyNewYear extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dept = DB::table('departments') //01
        // ->get();
        // return($dept);

        // $emp = DB::table('employees')	 //02
        // ->take(10)
        // ->get(['emp_no', 'first_name']);
        // return($emp);

    //     $emp = DB::table('employees') //03
    //    ->select('emp_no', 'first_name')   ->offset(10)
	// ->limit(5)
	// ->get();
    //     return($emp);

    // $emp = DB::table('employees') //04
    //     ->where('emp_no','10009')
    //     ->get();
    //     return($emp);


    // $emp = DB::table('employees')  //05
    // ->where('first_name', 'like', 'T%')
    // ->whereRaw('YEAR(CURDATE()) - YEAR(birth_date) > 70')
    // ->get();
    //     return($emp);

    // $emp = DB::table('dept_emp') //06
    // ->select('dept_no',
    //     DB::raw('COUNT(*) as cnt'))
    // ->whereYear('to_date','<>','9999')
    // ->groupBy('dept_no')
    // ->get();
    // return($emp);

    // $emp = DB::table('dept_emp') //07
    //     ->select('*',
	// DB::raw('YEAR(NOW()) - YEAR(to_date) as w'))
    //     ->whereYear('to_date','2000')
    //     ->limit(10)
    //     ->get();
    //         return($emp);

    // $emp = DB::table('dept_emp')  //08
	//   //__________________________________________________________________________
    //     ->leftJoin('employees','dept_emp.emp_no','=','employees.emp_no')

	//   //__________________________________________________________________________
    //     ->leftJoin('departments','dept_emp.dept_no','=','departments.dept_no')

	//   //__________________________________________________________________________
    //     ->select('employees.*','dept_name','dept_emp.to_date',
	// 		DB::raw('YEAR(CURDATE()) - YEAR(dept_emp.to_date) as work'))

	//   //__________________________________________________________________________
    //     ->whereYear('to_date','<>','9999')
    //     ->limit(10)
    //     ->get();
    //     return($emp);

    // $dept = DB::table('departments') //09
    //     ->get();

    // return($dept);

    // $emp = DB::table('employees') //10
    // ->where('emp_no','9999999')
    // ->get();

    //  return($emp);

    // $result = DB::table('titles')  //001
    // ->select('title')
    // ->distinct()
    // ->orderBy('title')
    // ->get();

    // return Inertia::render('Employees/happy' ,[
    //     'result' => $result
    // ]);

    //     $result = DB::table('employees')  //002
    //     ->select('emp_no','birth_date', DB::raw('YEAR(NOW())- YEAR(birth_date) AS age'))
    //     ->get();

    //     return Inertia::render('Employees/happy' ,[
    //      'result' => $result
    //  ]);

    //     $result = DB::table('employees') //003
    //     ->select('gender',DB::raw('COUNT(*) AS employee_count'))  // (*) คือจำนวนทั้งหมดของสิ้งที่ต้องการหา
    //     ->groupBy('gender')
    //     ->get();

    // return Inertia::render('Employees/happy' ,[
    //     'result' => $result
    // ]);

//     $result = DB::table('dept_manager') //004
//     ->where('to_date','9999-01-01')
//     ->get();

// return Inertia::render('Employees/happy' ,[
//     'result' => $result
// ]);

// $result = DB::table('salaries') //005
// ->whereYear('to_date','=',9999)
// ->get();

// return Inertia::render('Employees/happy' ,[
// 'result' => $result
// ]);

// $result = DB::table('dept_emp') //006
//    ->select('dept_no',DB::raw('COUNT(*) AS emp_count' ))  // (*) คือจำนวนทั้งหมดของสิ้งที่ต้องการหา
//    ->where('to_date','9999-01-01')
//    ->groupBy('dept_no')
//     ->get();

//  return Inertia::render('Employees/happy' ,[
//      'result' => $result
//  ]);


// $result = DB::table('dept_emp') //007
// ->join('salaries','dept_emp.emp_no','=','salaries.emp_no')
// ->select('dept_no',DB::raw('AVG(salaries.salary) AS salary_avg' ))  // (*) คือจำนวนทั้งหมดของสิ้งที่ต้องการหา
// ->where('dept_emp.to_date','9999-01-01')
// ->where('salaries.to_date','9999-01-01')
// ->groupBy('dept_no')
// ->get();

//  return Inertia::render('Employees/happy' ,[
//      'result' => $result
//  ]);


// $result = DB::table('dept_emp')  //008
// ->insert([
//     'emp_no' => '9999999',
//     'dept_no' => 'd010',
//     'from_date' => now(),
//     'to_date' => '9999-01-01'
// ]);

// return Inertia::render('Employees/happy' ,[
//     'result' => $result
// ]);


// $result = Db::table('dept_emp') //009
// ->where('to_date','9999-01-01')
// ->update(['salaries'=>DB::raw('salary*1.1')]);    //คือการคูณค่าของฟิลด์ "salary" ในฐานข้อมูลด้วยค่า 1.1ซึ่งหมายถึงการเพิ่มเงินเดือนของพนักงานทุกคนขึ้นทีละ 10% จากมูลค่าเดิมที่อยู่ในฐานข้อมูล

// return Inertia::render('Employees/happy' ,[
//     'result' => $result
// ]);

    $result = DB::table('salaries')
    ->where('emp_no','10001')
    ->where('to_date','<>','9999-01-01')
    ->delete();

return Inertia::render('Employees/happy' ,[
        'result' => $result
]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
