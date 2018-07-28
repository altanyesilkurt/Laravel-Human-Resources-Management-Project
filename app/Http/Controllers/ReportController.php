<?php

namespace App\Http\Controllers;

use App\Exports\SmsReportExport;
use App\Reports\SmsReport;
use App\SmsProvider;
use App\Tenant;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index', [
            'types'         => ['send sms', 'İnstall sms credit'],
            'status'        => ['Unsuccessful', 'Successful'],
            'tenants'       => Tenant::pluck('name', 'id'),
            'sms_providers' => SmsProvider::pluck('name', 'id'),
        ]);
    }

    public function gridData(Request $request, SmsReport $report)
    {
        return $report->getGrid($request);
    }

    public function export(SmsReportExport $export)
    {
        ini_set('memory_limit', '3G');

        return $export->download('invoices.xlsx');
    }
    public function exportToPdf(SmsReportExport $export)
    {
        ini_set('memory_limit', '3G');

        return $export->download('invoices.pdf');
    }
}
