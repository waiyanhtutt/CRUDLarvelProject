<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function createEmployee(Request $request)
    {
        $this->createValidation($request);
        // dd(request()->all());
        $createdata = $this->getCreateData($request);
        Employee::create($createdata);

        return back()->with(['createSuccess' => 'Creating Success']);
    }

    private function getCreateData($request)
    {
        return [
            "name" => $request->employeeName,
            "email" => $request->employeeEmail,
            "phonenumber" => $request->employeePhone,
            "address" => $request->employeeAddress
        ];
    }

    public function readEmployee()
    {
        $addEmployee = Employee::orderBy('created_at', 'asc')->paginate(10);
        // dd($addEmployee);
        return view('create', compact('addEmployee'));
    }

    public function deleteEmployee($id)
    {
        Employee::find($id)->delete();

        return back();
    }

    public function updateEmployee($id)
    {
        // dd($id);
        $updatedata = Employee::where('id', $id)->first()->toArray();
        // dd($updatedata);
        return view('update', compact('updatedata'));
    }

    public function saveEmployee(Request $request, $id)
    {
        $this->createValidation($request);
        $saveEmployee =  $this->getCreateData($request);

        Employee::where('id', $id)->update($saveEmployee);
        return redirect()->route('read#employee')->with(['updatingsuccess' => 'Updating Success']);
    }

    private function createValidation($request)
    {
        $validationrules = [
            'employeeName' => 'required',
            'employeeEmail' => 'required',
            'employeePhone' => 'required',
            'employeeName' => 'required',
            'employeeAddress' => 'required|max:100'
        ];

        Validator::make($request->all(), $validationrules)->validate();
    }
}
