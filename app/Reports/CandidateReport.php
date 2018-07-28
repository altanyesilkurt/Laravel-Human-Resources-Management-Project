<?php
/**
 * Created by PhpStorm.
 * User: ALTAN
 * Date: 10.07.2018
 * Time: 14:57
 */

namespace App\Reports;
use App\Candidate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class CandidateReport
{
    public function getQuery(Request $request)
    {
        return Candidate::with('company')
            ->select(['id', 'name', 'phone', 'company_id','cv'])
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
                return '<a href="' . route('candidate.report.edit', $user->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="'. route('candidate.report.destroy', $user->id) .'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })->rawColumns(['cv','action'])
         ->make(true);
    }
}