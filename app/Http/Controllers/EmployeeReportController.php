<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Reports\EmployeeReport;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Employee;
use App\Department;
use App\Company;
use App\Title;

class EmployeeReportController extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

    public function index()
    {
        return view('employeeReports.index',
            ['companies' => Company::pluck('name', 'id')]);
    }
    public function gridData(Request $request, EmployeeReport $report)
    {
        return $report->getGrid($request);
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

        return view('employeeReports.create',
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

        return redirect('/employeeReports')->
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

        return view('employeeReports.edit', ['employee' => $employee],
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

        return redirect('/employeeReports')->
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

        return redirect('/employeeReports')->
        with('messages', 'Employee deleted successfully');
    }
}
