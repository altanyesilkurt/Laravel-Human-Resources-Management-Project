<?php

namespace App\Reports;


use App\SmsLog;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class SmsReport
{
    public function getQuery(Request $request)
    {
        return SmsLog::with(['tenant', 'smsProvider'])
            ->select(['id', 'tenant_id', 'sms_provider_id', 'type', 'to', 'status', 'created_at'])
            ->when($request->filled('to'), function ($query) use ($request) {
                $query->where('to', 'LIKE', "%{$request->input('to')}%");
            })
            ->when($request->filled('tenant_id'), function ($query) use ($request) {
                $query->where('tenant_id', $request->input('tenant_id'));
            })
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->input('type') + 1);
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            })
            ->when($request->filled('start_time'), function ($query) use ($request) {
                $query->where('created_at', '>=', $request->input('start_time'));
            })
            ->when($request->filled('end_time'), function ($query) use ($request) {
                $query->where('created_at', '<=', $request->input('end_time'));
            })
            ->when($request->filled('sms_provider_id'), function ($query) use ($request) {
                $query->where('sms_provider_id', $request->input('sms_provider_id'));
            });
    }

    public function getGrid(Request $request)
    {
        $query = $this->getQuery($request);
        return DataTables::of($query)
            ->editColumn('tenant_id', function ($report) {
                $tenant_name = $report->tenant->name;
                return $tenant_name;
            })
            ->editColumn('sms_provider_id', function ($report) {
                if (!empty($report->smsProvider->name)) {
                    $providerName = $report->smsProvider->name;
                    return $providerName;
                } else
                    return null;
            })
            ->editColumn('type', function ($report) {
                if ($report->type == 2){
                    return "install sms credit";
                } else
                    return "send sms";
            })
            ->editColumn('status', function ($report) {
                if (!is_null($report->status) && $report->status == 0) {
                    return "unsuccessful";
                } else if ($report->status && $report->status == 1)
                    return "successful";
                else
                    return null;
            })->make(true);
    }
}