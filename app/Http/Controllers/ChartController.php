<?php

namespace App\Http\Controllers;

use App\SmsLog;
use DB;

class ChartController extends Controller
{
    public function index()
    {
        return view('charts.index');
    }

    public function projectChartData()
    {
        $result = SmsLog::with(['tenant'])
            ->select('tenant_id', DB::raw('count(tenant_id) as tenant_count'))
            ->groupBy('tenant_id')
            ->get();
        return response()->json($result);
    }

}