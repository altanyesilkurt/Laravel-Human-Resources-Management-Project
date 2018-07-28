<?php /** @var \App\Employee[] $employees */ ?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Employees
            </div>
            <div class="card-body">
                <a class="btn btn-secondary pull-right" href="employees/create" style="margin-bottom:15px;">
                    <i style="color: blue" class="fa fa-plus"></i> Create New
                </a>
                @include('employees.filters')
                @if($employees->isEmpty())
                    No employee found
                @else
                    <table class="table table-striped">
                        <thead class="thead thead-dark">
                        <tr>
                            <th style="padding-left:15px;">#</th>
                            <th> FirstName</th>
                            <th> LastName</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Department</th>
                            <th>Branch</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th width="110px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td style="padding-left:15px;">{!!$employee->id!!}</td>
                                <td>{!!$employee->firstname!!}</td>
                                <td>  {!!$employee->lastname!!} </td>
                                <td>  {!!$employee->phone!!} </td>
                                <td>  {!!$employee->email!!}</td>
                                <td> {!!$employee->company->name!!} </td>
                                <td> {!!$employee->department->name!!}</td>
                                <td> {!!$employee->branch->name!!}</td>
                                <td> {!!$employee->title->name!!}</td>
                                <td>
                                    @if($employee->status==0)
                                        <img src="/app/public/logos/{{'tick.png' }}" alt="" height="40">
                                    @else
                                        <img src="/app/public/logos/{{'ex.png' }}" alt="" height="40">
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm " href="{!!'employees/'.$employee->id.'/edit '!!}">Edit</a>
                                    {!!Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'/employees/'.$employee->id])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$employees->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection