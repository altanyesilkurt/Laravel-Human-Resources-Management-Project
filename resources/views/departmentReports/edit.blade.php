@extends('layouts.app')
@section('content')

        <div class="box">
            <div class="box-header">
                Edit Department
            </div>
            <div class="box-body">
                <a class="btn btn-primary pull-right" href="/departmentReports" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>

                {!! Form::model($department,['method'=>'PATCH','action'=>['DepartmentReportController@update',$department->id]]) !!}
                @include('departmentReports.form')
                {!!Form::close()!!}
            </div>
        </div>
    </div>

@endsection()