@extends('layouts.app')
@section('content')
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Compose New Message</h3>
            </div>
            <div class="box-body">
                @if(session()->has('messages'))
                    <div class="alert alert-success">
                        {{ session()->get('messages') }}
                    </div>
                @endif
                {!! Form::open(['method'=>"POST",'url' => '/sendEmail']) !!}
                @include('emails.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection