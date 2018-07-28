@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                Update employee
            </div>
            <div class="card-body">

                <a class="btn btn-secondary pull-right" href="/employees" style="margin-bottom: 15px;"><i class="fa fa-reply"></i>Back</a>
                {!! Form::model($employee,[ 'method'=>'PATCH','action'=>['EmployeeController@update',$employee->id]]) !!}

                @include('employees.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection()