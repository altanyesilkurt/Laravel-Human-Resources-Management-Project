<?php
/**
 * Created by PhpStorm.
 * User: ALTAN
 * Date: 13.07.2018
 * Time: 15:11
 */

namespace App\Reports;
use App\Branch;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class BranchReport
{
    public function getQuery(Request $request)
    {
        return Branch::with('company')
            ->select(['id', 'name', 'address', 'company_id'])
            ->when($request->filled('name'), function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->input('name')}%");
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
            ->addColumn('action', function ($user) {
                return '<a href="' . route('branch.report.edit', $user->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="'. route('branch.report.destroy', $user->id) .'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })->rawColumns(['action'])
            ->make(true);
    }
}