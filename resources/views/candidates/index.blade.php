<?php /** @var \App\candidate[] $candidates */ ?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Candidates
            </div>
            <div class="card-body">
                </hr>
                <a class="btn btn-secondary pull-right" href="candidates/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus"></i>Create New</a>
                @if($candidates->isEmpty())
                    No candidate found
                @else
                    {!! Form::open(['method'=>'GET','url'=>'candidates','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
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
                        <th> Name  </th>
                        <th> Phone  </th>
                        <th> Company  </th>
                        <th> CV  </th>
                        <th width="110px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($candidates as $candidate)
                        <tr>
                            <td style="padding-left:15px;">{!!$candidate->id!!}</td>
                            <td>{!!$candidate->name!!}</td>
                            <td>{!!$candidate->phone!!}</td>
                            <td>{!!$candidate->company->name!!}</td>
                            <td >
                                @if($candidate->cv)
                                    <img src="/app/public/logos/{{'cv.png'}}"  height="50">
                                     <a href="{{route('candidate.cv.download', ['file' => $candidate->cv])}}">
                                         {!! $candidate->cv !!}
                                     </a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm " href="{!!'candidates/'.$candidate->id.'/edit '!!}">Edit</a>
                                {!!Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'/candidates/'.$candidate->id])!!}
                                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$candidates->links()}}
             @endif
            </div>
        </div>
    </div>
@endsection()

