<?php
/**
 * Created by PhpStorm.
 * User: ALTAN
 * Date: 13.07.2018
 * Time: 16:08
 */

namespace App\Reports;

use App\Title;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
class TitleReport
{
    public function getQuery(Request $request)
    {
        return Title::query()
            ->select(['id', 'name'])
            ->when($request->filled('name'), function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->input('name')}%");
            });
    }
    public function getGrid(Request $request)
    {
        $query = $this->getQuery($request);
        return DataTables::of($query)

            ->addColumn('action', function ($user) {
                return '<a href="' . route('title.report.edit', $user->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="'. route('title.report.destroy', $user->id) .'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })->rawColumns(['action'])
            ->make(true);
    }
}