        @extends('layouts.app')
        @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">

                        <h2>Create Branch</h2>
                        </hr>
                    <a class="btn btn-secondary pull-right" href="/branches"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>

                        {!! Form::open(['method'=>"POST",'url' => '/branches']) !!}

                        @include('branches.form')
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endsection()