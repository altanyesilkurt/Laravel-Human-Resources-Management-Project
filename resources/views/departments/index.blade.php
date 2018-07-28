<?php /** @var \App\Department[] $departments */ ?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Departments
            </div>
            <div class="card-body">
                </hr>
                <a class="btn btn-secondary pull-right" href="departments/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus"></i>Create New</a>
                @if($departments->isEmpty())
                    No department found
                @else
                    {!! Form::open(['method'=>'GET','url'=>'departments','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

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
                        <th> DepartmentName </th>
                        <th> Company </th>
                        <th width="110px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td style="padding-left:15px;">{!!$department->id!!}</td>
                            <td>{!!$department->name!!}</td>
                            <td>  {!!$department->company->name!!} </td>
                            <td>
                                <a class="btn btn-success btn-sm " href="{!!'departments/'.$department->id.'/edit '!!}">Edit</a>
                                {!!Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'/departments/'.$department->id])!!}
                                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$departments->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection()