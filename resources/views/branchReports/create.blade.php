        @extends('layouts.app')
        @section('content')

            <div class="box">
                <div class="box-header">

                        <h2>Create Branch</h2>
                        </hr>
                    <a class="btn btn-secondary pull-right" href="/branchReports"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>

                        {!! Form::open(['method'=>"POST",'url' => '/branchReports']) !!}

                        @include('branchReports.form')
                        {!! Form::close() !!}
                </div>
            </div>
        @endsection()