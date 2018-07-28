
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Candidate
            </div>
            <div class="card-body">
                <a class="btn btn-primary pull-right" href="/candidates" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>
                {!! Form::model($candidate,['files'=>true,'method'=>'PATCH','action'=>['CandidateController@update',$candidate->id]]) !!}
                @include('candidates.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection()