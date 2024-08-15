<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;

// Create
Route::post('/employee/create', [EmployeeController::class, 'createEmployee'])->name('create#employee');

// Read
Route::get('/', [EmployeeController::class, 'readEmployee'])->name('read#employee');

// Delete
Route::delete('employee/detete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('delete#employee');

// Update
Route::get('employee/update/{id}', [EmployeeController::class, 'updateEmployee'])->name('update#Employee');

// Save
Route::post('employee/save/{id}', [EmployeeController::class, 'saveEmployee'])->name('save#Employee');
