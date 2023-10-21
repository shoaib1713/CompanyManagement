<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class EmployeeController extends Controller
{
    public function index()
    {
        //Get a list of all employees
        $employees = Employees::all();
        return response()->json($employees);
    }

    public function show($id)
    {
        // Get a specific employee
        $employee = Employees::find($id);
        return response()->json($employee);
    }

    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'dept_id' => 'required|exists:departments,id',
            // Add more rules as needed
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new employee
        $employee = Employees::create([
            'emp_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'dept_id' => $request->department
        ]);

        if($employee){
            return response()->json([
                'status'=>200,
                'Message'=>'Records Successfully Added'
            ],200);
        }else{
            return response()->json([
                'status'=>500,
                'Message'=>"Something went wrong"
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            // Add more rules as needed
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update an employee
        $employee = Employees::find($id);
        $employee->update($request->all());
        return response()->json($employee);
    }

    public function destroy($id)
    {
        // Delete an employee
        Employees::destroy($id);
        return response()->json(null, 204);
    }
}
