<?php /** @var \App\title[] $titles */ ?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Titles
            </div>
            <div class="card-body">
                </hr>
                <a class="btn btn-secondary pull-right" href="titles/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus"></i>Create New</a>
                @if($titles->isEmpty())
                    No Title found
                @else
                {!! Form::open(['method'=>'GET','url'=>'titles','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-search">Name</i>
            </button>
        </span>
                </div>
                {!! Form::close() !!}
                <table class="table table-striped">
                    <thead class="thead thead-dark">
                    <tr>
                        <th style="padding-left:15px;">#</th>
                        <th> TitleName  </th>
                        <th width="110px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($titles as $title)
                        <tr>
                            <td style="padding-left:15px;">{!!$title->id!!}</td>
                            <td>{!!$title->name!!}</td>
                            <td>
                                <a class="btn btn-success btn-sm " href="{!!'titles/'.$title->id.'/edit '!!}">Edit</a>
                                {!!Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'/titles/'.$title->id])!!}
                                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$titles->links()}}
             @endif
            </div>
        </div>
    </div>
@endsection()