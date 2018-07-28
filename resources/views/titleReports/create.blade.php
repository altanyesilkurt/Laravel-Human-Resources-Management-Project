
@extends('layouts.app')
@section('content')

        <div class="box">
            <div class="box-header">
                Create title
            </div>
            <div class="box-body">
                <a class="btn btn-secondary pull-right" href="/titleReports"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>
                {!! Form::open(['id'=>'dataForm','method'=>"POST",'url' => '/titleReports']) !!}
                @include('titleReports.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection()