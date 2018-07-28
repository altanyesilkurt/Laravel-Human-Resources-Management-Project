@extends('layouts.app')
@section('content')

        <div class="box">
            <div class="box-header">
                Edit Company
            </div>
            <div class="box-body">
                <a class="btn btn-primary pull-right" href="/companyReports" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>
                {!! Form::model($company,['files'=>true ,'method'=>'PATCH','action'=>['CompanyReportController@update',$company->id]]) !!}
                @include('companyReports.form')
                {!! Form::close() !!}
            </div>
        </div>


@endsection()