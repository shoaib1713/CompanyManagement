<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class DepartmentController extends Controller
{
    public function index()
    {
        // Get a list of all departments
        $departments = Department::all();
        return response()->json($departments);
    }

    public function show($id)
    {
        // Get a specific department
        $department = Department::find($id);
        return response()->json($department);
    }

     public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'dept_name' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new department
        $department = Department::create([
            'dept_name'=>$request->dept_name,
            'description'=> $request->description
        ]);
        if($department){
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
        if(empty($id)){
            return response()->json(['error' =>'Department Id is required'], 400);
        }
        $rules = [
            'name' => 'required|string|max:255',
            // Add more rules as needed
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update a department
        $department = Department::find($id);
        $department->update($request->all());
        return response()->json($department);
    }

    public function destroy($id)
    {
        // Delete a department
        Department::destroy($id);
        return response()->json(null, 204);
    }
}
