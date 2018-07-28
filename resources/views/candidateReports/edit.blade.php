
@extends('layouts.app')
@section('content')

        <div class="box">
            <div class="box-header">
                Edit Candidate
            </div>
            <div class="box-body">
                <a class="btn btn-primary pull-right" href="/candidateReports" style="margin-bottom: 15px;"><i
                            style="color: #1c7430" class="fa fa-reply"></i>Go Back</a>
                {!! Form::model($candidate,['files'=>true,'method'=>'PATCH','action'=>['CandidateReportController@update',$candidate->id]]) !!}
                @include('candidateReports.form')
                {!! Form::close() !!}
            </div>
        </div>
@endsection()