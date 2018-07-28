        @extends('layouts.app')
        @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">

                        <h2>Create Company</h2>
                        </hr>
                    <a class="btn btn-secondary pull-right" href="/companies"  style="margin-bottom: 15px;" ><i style="color: #0c5460" class=" fa fa-reply"></i>Back</a>

                        {!! Form::open(['files' =>true,'method'=>"POST",'url' => '/companies']) !!}

                        @include('companies.form')
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endsection()