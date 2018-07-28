<?php /** @var \App\Branch[] $branches */ ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Branches
            </div>
            <div class="card-body">
                </hr>
                <a class="btn btn-secondary pull-right" href="branches/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus"></i>Create New</a>
                @if($branches->isEmpty())
                    No branch found
                @else
                {!! Form::open(['method'=>'GET','url'=>'branches','class'=>'navbar-form navbar-left','role'=>'search'])  !!}


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
                        <th> BranchName  </th>
                        <th> Company </th>
                        <th> Address </th>
                        <th width="110px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($branches as $branch)

                        <tr>
                            <td style="padding-left:15px;">{!!$branch->id!!}</td>
                            <td>{!!$branch->name!!}</td>
                            <td>  {!!$branch->company->name!!} </td>
                            <td>{!!$branch->address!!}</td>
                            <td>
                                <a class="btn btn-success btn-sm " href="{!!'branches/'.$branch->id.'/edit '!!}">Edit</a>

                                {!!Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'/branches/'.$branch->id])!!}
                                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$branches->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection()