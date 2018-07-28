@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Branch
            </div>
            <div class="card-body">


                <a class="btn btn-primary pull-right" href="/branches" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>
                {!! Form::model($branch,['files'=>true ,'method'=>'PATCH','action'=>['BranchController@update',$branch->id]]) !!}
                @include('branches.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection()