@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Company
            </div>
            <div class="card-body">


                <a class="btn btn-primary pull-right" href="/companies" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>
                {!! Form::model($company,['files'=>true ,'method'=>'PATCH','action'=>['CompanyController@update',$company->id]]) !!}
                @include('companies.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection()