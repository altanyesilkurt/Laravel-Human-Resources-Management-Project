    @extends('layouts.app')
    @section('content')
        <div class="container">

            <div class="card">
                <div class="card-header">
                    Companies
                </div>
                <div class="card-body">
                    <a class="btn btn-secondary pull-right" href="companies/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus "></i>Create New</a>

                     @if($companies->isEmpty())
                         No company found
                     @else
                        {!! Form::open(['method'=>'GET','url'=>'companies','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

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
                        <thead class="thead-dark">
                        <tr>
                            <th style="padding-left:15px;">#</th>
                            <th> Name  </th>
                            <th> Address  </th>
                            <th>Phone</th>
                            <th>Web site</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th width="110px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($companies as $company)
                            <tr>
                                <td style="padding-left:15px;">{!!$company->id!!}</td>
                                <td>{!!$company->name!!}</td>
                                <td>  {!!$company->address!!} </td>
                                <td>  {!!$company->phone!!} </td>
                                <td>  {!!$company->website!!}</td>
                                <td>  {!!$company->email!!}</td>
                                <td>

                                    @if($company->logo)
                                        <img src="/app/public/logos/{{ $company->logo }}" alt="" height="100">
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm " href="{!!'companies/'.$company->id.'/edit '!!}">Edit</a>

                                    {!!Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'/companies/'.$company->id])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                    {!!Form::close()!!}

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{$companies->links()}}
                         @endif
                </div>

            </div>
        </div>
    @endsection()