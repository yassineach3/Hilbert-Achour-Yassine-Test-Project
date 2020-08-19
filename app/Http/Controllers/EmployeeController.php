<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(5);
        if (Employee::all()->isEmpty()) {
            session()->flash('employee_error','You have no employee yet! ');
            return view('employee.index');
        }
        $data = ['employees'=>$employees];
        return view('employee.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create', ['compaines' => Company::all('id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->designation = $request->designation;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->company = $request->company;
        $employee->save();

        session()->flash('employee_saved','You have successfuly saved your employee :)');

        return redirect()->route('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        session()->flash('update','You will update your employee');
        return view('employee.edit',['employee'=>$employee, 'compaines' => Company::all('id')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Employee::where('id', $id)->firstOrFail()->update($request->all());
        session()->flash('updated_successfuly', 'Your employee is updated succssesfuly');
        return redirect()->route('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->delete();
        session()->flash('employee_deleted','You have successfuly deleted the employee');
        return back();

    }
}
