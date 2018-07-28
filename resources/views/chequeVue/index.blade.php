<?php ?>
@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header  " style="align-content: center ">
            CHEQUE DEPOSIT SLIP
        </div>
        <div class="box-body">
            <div id="app">
                <div class="container">
                    <articles></articles>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection