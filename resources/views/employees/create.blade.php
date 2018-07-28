        @extends('layouts.app')
        @section('content')
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Create Employee
                    </div>
                    <div class="card-body">
                        <a class="btn btn-secondary pull-right" href="/employees"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>

                        {!! Form::open(['id'=>'dataForm','method'=>"POST",'url' => '/employees']) !!}

                        @include('employees.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endsection()