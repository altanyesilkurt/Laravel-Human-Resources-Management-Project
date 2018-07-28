<?php
/**
 * Created by PhpStorm.
 * User: ALTAN
 * Date: 12.07.2018
 * Time: 17:24
 */

namespace App\Reports;
use Yajra\DataTables\Facades\DataTables;
use App\Company;
use Illuminate\Http\Request;

class CompanyReport
{
    public function getQuery(Request $request)
    {
        return Company::query()
            ->select('id','name','address','phone','website','email','logo')
        ->when($request->filled('name'), function ($query) use ($request) {
        $query->where('name', 'LIKE', "%{$request->input('name')}%");
    });
    }
    public function getGrid(Request $request)
    {
        $query = $this->getQuery($request);
        return DataTables::of($query)
            ->addColumn('logo', function ($user) {
               return '<img src="/app/public/logos/'.$user->logo.'" width="54">';
            })
            ->addColumn('action', function ($user) {
                return '<a href="'.route('company.report.edit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="'. route('company.report.destroy', $user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->rawColumns(['logo','action'])
            ->make(true);
    }
}