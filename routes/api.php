<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('departments', [DepartmentController::Class,'index']);
Route::post('adddepartment', [DepartmentController::Class,'store']);
Route::post('updateDepartment', [DepartmentController::Class,'update']);



Route::get('employee',[EmployeeController::class,'index']);
Route::post('addemployee',[EmployeeController::class,'store']);
Route::post('updateEmployee',[EmployeeController::class,'update']);
