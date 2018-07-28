@extends('layouts.app')
@section('content')

        <div class="box">

            <div class="card-header">
                Update employee
            </div>
            <div class="box-body">

                <a class="btn btn-secondary pull-right" href="/employeeReports" style="margin-bottom: 15px;"><i class="fa fa-reply"></i>Back</a>
                {!! Form::model($employee,[ 'method'=>'PATCH','action'=>['EmployeeReportController@update',$employee->id]]) !!}

                @include('employeeReports.form')
                {!! Form::close() !!}
            </div>
        </div>

@endsection()