@extends('layouts.app')
@section('content')

        <div class="box">
            <div class="box-header">
                Create Candidate
            </div>
            <div class="box-body">
                <a class="btn btn-secondary pull-right" href="/candidateReports"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>

                {!! Form::open(['files' =>true,'method'=>"POST",'url' => '/candidateReports']) !!}

                @include('candidateReports.form')
                {!! Form::close() !!}
            </div>
        </div>
@endsection()