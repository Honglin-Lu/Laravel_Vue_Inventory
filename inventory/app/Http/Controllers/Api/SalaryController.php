<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function Paid(Request $request, $id){
        $ValidateData = $request->validate([
            'salary_month' => 'required',
        ]);
        
        $month = $request->salary_month;
       
        $data = array();
        $data['employee_id'] = $id;
        $data['amount'] = $request->salary;
        $data['salary_date'] = date('d/m/y');
        $data['salary_month'] = $month;
        $data['salary_year'] = date('Y');

        DB::table('salaries')->insert($data);

    }
}
