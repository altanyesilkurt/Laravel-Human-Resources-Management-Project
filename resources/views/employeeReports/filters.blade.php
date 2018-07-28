{!! Form::open(['method'=>'GET','id'=>'search-form','url'=>'employeeReports','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('firstname','FirstName:')!!}
            <div class="">
                {!! Form::text('firstname',null,['placeholder'=>'Enter name','class'=>'form-control'])!!}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('company_id','Company:')!!}
            <div class="">
                {{ Form::select('company_id',$companies,null,['class' => 'form-control','placeholder'=>'(All Companies)']) }}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('phone','Phone:')!!}
            <div class="">
                {!! Form::text('phone',null,['placeholder'=>'Enter phone','class'=>'form-control'])!!}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('status','Status:')!!}
            <div class="">
                {!!Form::select('status',['Employee is  working','Employee is not working'],null,
             ['class' => 'form-control','placeholder'=>'(All Statuses)'])!!}
            </div>
        </div>
    </div>
</div>
<span class="input-group-btn">
            <button class="btn btn-default-sm pull-right" type="submit">
                <i class="fa fa-search">Search</i>
            </button>
        </span>
{!! Form::close() !!}