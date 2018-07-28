<?php

namespace App\Http\Controllers;

use App\SmsLog;
use App\SmsProvider;
use App\Tenant;
use Illuminate\Http\Request;

class Sms_logController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sms_logs=SmsLog::with('tenant', 'smsProvider')->
            orderBy('id')
            ->when($request->filled('to'), function ($query) use ($request) {
                $query->where('to', 'LIKE', "%{$request->input('to')}%");
            })
            ->when($request->filled('tenant_id'), function ($query) use ($request) {
                $query->where('tenant_id', $request->input('tenant_id'));
            })
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->input('type')+1);
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status',$request->input('status'));
            })
            ->when($request->filled('start_time'), function ($query) use ($request) {
                $query->where('created_at','>=', $request->input('start_time'));
            })
            ->when($request->filled('end_time'), function ($query) use ($request) {
                $query->where('created_at', '<=',$request->input('end_time'));
            })
            ->when($request->filled('sms_provider_id'), function ($query) use ($request) {
                $query->where('sms_provider_id', $request->input('sms_provider_id'));
            })->paginate(20);



        $type = SmsLog::pluck('type', 'id');
        $sms_provider_id = SmsLog::pluck('sms_provider_id', 'id');
        $to = SmsLog::pluck('to', 'id');
        $status = SmsLog::pluck('status', 'id');
        $start_date = SmsLog::pluck('created_at', 'id');

        $tenants=Tenant::pluck('name','id');
        $sms_providers=SmsProvider::pluck('name','id');
        $types=['send sms','İnstall sms credit'];
        $statue=['Unsuccessful','Successful'];

        return view('sms_logs.index',['sms_logs'=>$sms_logs],
            compact('sms_provider_id','type','to','status','start_date','tenants','sms_providers','types','statue'));
    }

    /**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
