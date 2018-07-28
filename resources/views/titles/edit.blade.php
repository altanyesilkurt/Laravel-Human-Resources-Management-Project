
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit title
            </div>
            <div class="card-body">


                <a class="btn btn-primary pull-right" href="/titles" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>

                {!! Form::model($title,['method'=>'PATCH','action'=>['TitleController@update',$title->id]]) !!}
                @include('titles.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection()