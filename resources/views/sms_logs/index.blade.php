<?php /** @var \App\SmsLog[] $sms_logs */ ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Sms
            </div>
            <div class="card-body">
                @include('sms_logs.filters')
                    <table class="table table-striped">
                        <thead class="thead thead-dark">
                        <tr>
                            <th style="padding-left:15px;">#</th>
                            <th>Tenant</th>
                            <th>SmsProvider</th>
                            <th>Type</th>
                            <th>To</th>
                            <th>Status</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sms_logs as $sms_log)
                            <tr>
                                <td style="padding-left:15px;">{!!$sms_log->id!!}</td>
                                <td>{!!$sms_log->tenant->name!!}</td>
                                <td>

                                    @if($sms_log->sms_provider_id)
                                        {!!$sms_log->smsProvider->name!!}
                                    @else

                                    @endif

                                 </td>
                                <td>
                                    @if($sms_log->type==2)
                                        upload sms credit
                                    @else($sms_log->type==1)
                                        send sms
                                    @endif
                                     </td>
                                <td>  {!!$sms_log->to!!}</td>
                                <td>
                                    @if(!is_null($sms_log->status)&&$sms_log->status==0)
                                        unsuccessful
                                    @elseif($sms_log->status&&$sms_log->status==1)
                                     successful
                                        @else

                                        @endif
                                </td>
                                <td>  {!!  Carbon\Carbon::parse($sms_log->created_at)->format('d-m-Y H:i:s')!!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$sms_logs->links()}}
            </div>
        </div>
    </div>
@endsection()