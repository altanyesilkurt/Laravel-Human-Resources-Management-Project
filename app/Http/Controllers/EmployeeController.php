<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Employee;
use App\Department;
use App\Company;
use App\Title;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $employees = Employee::with('company','department','branch')->orderBy('id')
            ->when($request->filled('name'), function ($query) use ($request) {
                $query->where('firstname', 'LIKE', "%{$request->input('name')}%");
            })
            ->when($request->filled('phone'), function ($query) use ($request) {
                $query->where('phone', 'LIKE', "%{$request->input('phone')}%");
            })
            ->when($request->filled('company_id'), function ($query) use ($request) {
                $query->where('company_id', $request->input('company_id'));
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            })
            ->paginate(5);
            $companies = Company::pluck('name', 'id');
            return view('employees.index', ['employees' => $employees], compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $companies = Company::pluck('name', 'id');

        $departments = Department::pluck('name', 'id');

        $branches = Branch::pluck('name', 'id');

        $titles = Title::pluck('name', 'id');

        return view('employees.create',
            compact('companies', 'departments', 'branches', 'titles')

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->input();
        Employee::create($data);

        return redirect('/employees')->
        with('messages', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::pluck('name', 'id');

        $departments = Department::pluck('name', 'id');

        $branches = Branch::pluck('name', 'id');

        $titles = Title::pluck('name', 'id');

        $employee = Employee::find($id);

        return view('employees.edit', ['employee' => $employee],
            compact('departments', 'companies', 'branches', 'titles')

        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $data = $request->all();

        $employee = Employee::find($id);
        $employee->update($data);

        return redirect('/employees')->
        with('messages', 'Employee updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);

        return redirect('/employees')->
        with('messages', 'Employee deleted successfully');
    }
}
