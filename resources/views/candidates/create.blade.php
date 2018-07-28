@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create Candidate
            </div>
            <div class="card-body">
                <a class="btn btn-secondary pull-right" href="/candidates"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>

                {!! Form::open(['files' =>true,'method'=>"POST",'url' => '/candidates']) !!}

                @include('candidates.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection()