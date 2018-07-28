        @extends('layouts.app')
        @section('content')
            <div class="box">
                <div class="box-header">
                    <h2>Create Company</h2>
                        </hr>
                    <a class="btn btn-secondary pull-right" href="/companyReports"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>
                    {!! Form::open(['files' =>true,'method'=>"POST",'url' => '/companyReports']) !!}
                    @include('companyReports.form')
                        {!! Form::close() !!}
                </div>
            </div>
        @endsection