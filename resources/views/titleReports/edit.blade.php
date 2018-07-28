
@extends('layouts.app')
@section('content')
        <div class="box">
            <div class="box-header">
                Edit title
            </div>
            <div class="box-body">
                <a class="btn btn-primary pull-right" href="/titleReports" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>

                {!! Form::model($title,['method'=>'PATCH','action'=>['TitleReportController@update',$title->id]]) !!}
                @include('titleReports.form')
                {!! Form::close() !!}
            </div>
        </div>

@endsection()