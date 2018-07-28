@extends('layouts.app')
@section('content')
        <div class="box">
            <div class="box-header">
                Tasks
            </div>
            <div class="box box-solid">
            <div class="box-body">
                <div class="box-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <ul class="fc-color-picker" id="color-chooser">
                            <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                        </ul>
                    </div>
                </div>
                {!!Form::open(array('files'=>'true','route'=>'tasks.add','method'=>'POST'))  !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                    </div>
                    <div class="col-xs-3 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!!Form::label('task_name','Task name:')!!}
                            <div class="">
                                {!!Form::text('task_name',null,['class'=>'form-control'])  !!}
                                {!! $errors->first('task_name','<p  class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            {!!Form::label('start_date','Start date:')!!}
                            <div class="">
                                {!!Form::datetimeLocal('start_date',null,['class'=>'form-control'])  !!}
                                {!! $errors->first('start_date','<p  class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            {!!Form::label('end_date','End date:')!!}
                            <div class="">
                                {!!Form::datetimeLocal('end_date',null,['class'=>'form-control']) !!}
                                {!! $errors->first('end_date','<p  class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>

                    <br class="col-xs-1 col-sm-1 col-md-1 text-center " >&nbsp;<br/>
                    {!! Form::submit('Add Task',['class'=>'btn btn-primary btn-flat','style'=>'pull-right','id'=>'add-new-event'])!!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                Calendar
            </div>
            <div class="box-body">
                {!! $calendar_details->calendar() !!}
                {!! $calendar_details->script() !!}
            </div>
        </div>

@endsection

<script src="{{asset('public/js/app.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<script>
    @yield ('pageScript')
</script>
