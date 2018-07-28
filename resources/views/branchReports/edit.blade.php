@extends('layouts.app')
@section('content')
        <div class="box">
            <div class="box-header">
                Edit Branch
            </div>
            <div class="box-body">
                <a class="btn btn-primary pull-right" href="/branchReports" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>
                {!! Form::model($branch,['files'=>true ,'method'=>'PATCH','action'=>['BranchReportController@update',$branch->id]]) !!}
                @include('branchReports.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection()