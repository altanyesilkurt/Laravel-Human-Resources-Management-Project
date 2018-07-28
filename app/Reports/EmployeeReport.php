<?php
/**
 * Created by PhpStorm.
 * User: ALTAN
 * Date: 12.07.2018
 * Time: 11:19
 */

namespace App\Reports;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Employee;

class EmployeeReport
{
    public function getQuery(Request $request)
    {
        return Employee::with('company', 'department', 'branch')
            ->select([
                'id', 'firstname', 'lastname', 'company_id', 'department_id',
                'branch_id', 'title_id', 'phone', 'email', 'status',
            ])
            ->when($request->filled('firstname'), function ($query) use ($request) {
                $query->where('firstname', 'LIKE', "%{$request->input('firstname')}%");
            })
            ->when($request->filled('phone'), function ($query) use ($request) {
                $query->where('phone', 'LIKE', "%{$request->input('phone')}%");
            })
            ->when($request->filled('company_id'), function ($query) use ($request) {
                $query->where('company_id', $request->input('company_id'));
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            });

    }

    public function getGrid(Request $request)
    {
        $query = $this->getQuery($request);
        return DataTables::of($query)
            ->editColumn('company_id', function ($report) {
                $company_name = $report->company->name;
                return $company_name;
            })
            ->editColumn('department_id', function ($report) {
                $department_name = $report->department->name;
                return $department_name;
            })
            ->editColumn('branch_id', function ($report) {
                $branch_name = $report->branch->name;
                return $branch_name;
            })
            ->editColumn('title_id', function ($report) {
                $title_name = $report->title->name;
                return $title_name;
            })
            ->addColumn('status', function ($report) {
                if ($report->status == 0) {
                    return '<img src="/app/public/logos/tick.png" width="24">';
                }
                return '<img src="/app/public/logos/exit.png" width="24">';
            })
            ->addColumn('action', function ($user) {
                return '<a href="' . route('employee.report.edit', $user->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="' . route('employee.report.destroy', $user->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}