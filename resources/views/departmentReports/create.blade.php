@extends('layouts.app')
@section('content')
        <div class="box">
            <div class="box-header">
                Create Department
            </div>
            <div class="box-body">
                <a class="btn btn-secondary pull-right" href="/departmentReports"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>

                {!! Form::open(['id'=>'dataForm','method'=>"POST",'url' =>'/departmentReports']) !!}
                @include('departmentReports.form')
                {!! Form::close() !!}
            </div>
        </div>
@endsection()