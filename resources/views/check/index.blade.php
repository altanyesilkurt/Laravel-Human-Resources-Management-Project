<?php /** @var \App\Employee[] $employees */ ?>
@extends('layouts.app')
@section('content')
    {!! Form::open(['method'=>"POST",'url' => '/check']) !!}
    <div class="box">
        <div style="text-align: center">
        <h1  class="box-header">
          CHEQUE DEPOSIT SLIP
        </h1>
        </div>
        <div class="box-body">
            <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                <div class="form-group">
                    {!!Form::label('date','Date:')!!}
                    <div class="">
                        {!! Form::date('date',null,['class'=>'form-control'])!!}
                        {!! $errors->first('date', '<p style=color:red class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 pull-left">
                <div class="form-group">
                    {!!Form::label('name', 'Card Holders Name')!!}
                    {!!Form::text('name',null,['placeholder'=>'Enter name','class'=>'form-control'])!!}
                    {!! $errors->first('name', '<p style=color:red class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 pull-left">
            <div class="form-group">
                {!!Form::label('card_number', 'Credit Card Number')!!}
                {!!Form::text('card_number',null,['placeholder'=>'Enter number','class'=>'form-control'])!!}
                {!! $errors->first('card_number', '<p style=color:red class="help-block">:message</p>') !!}
            </div>
            </div>
    @include('check.table')

        <div class="col-xs-6 col-sm-6 col-md-6 pull-left">
            <div class="form-group">
                {!!Form::label('word','Amount in Words:')!!}
                <div class="">
                    {!! Form::text('word',null,['class'=>'form-control'])!!}
                    {!! $errors->first('word','<p style=color:red class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
            <div class="form-group">
                {!!Form::label('total','Total Amount')!!}
                <div class="">
                    {!! Form::text('total',null,['type'=>'float','class'=>'form-control'])!!}
                </div>
            </div>
        </div>
            <div class="col-xs-4 col-sm-4 col-md-4 pull-left">
                <div class="form-group">
                    {!!Form::label('depositor_name', 'Depositors Name:')!!}
                    {!!Form::text('depositor_name',null,['placeholder'=>'Enter name','class'=>'form-control'])!!}
                    {!! $errors->first('depositor_name', '<p style=color:red class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 pull-left">
                <div class="form-group">
                    {!!Form::label('depositor_phone', 'Depositors Mobile No:')!!}
                    {!!Form::text('depositor_phone',null,['placeholder'=>'Enter number','class'=>'form-control'])!!}
                    {!! $errors->first('depositor_phone', '<p style=color:red class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2 pull-right ">
                <div  class="form-group">
                    {!!Form::label('signature','Signature:')!!}
                    <div class="">
                        {!! Form::textarea('signature',null,['class'=>'form-control','rows' => 3])!!}
                    </div>
                </div>
            </div>
        </div>
    <button type="submit" class="btn btn-primary pull-right">
        <i class="fa fa-check"></i>Save
    </button>
    </div>
    {!! Form::close() !!}

@endsection
@include('check.total')
@include('check.add')