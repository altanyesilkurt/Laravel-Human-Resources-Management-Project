{!! Form::open(['method'=>'GET','id'=>'search-form','url'=>'reports','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="row">
   <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('tenant_id','Tenant:')!!}
            <div class="">
                {{ Form::select('tenant_id',$tenants,null,['class' => 'form-control','placeholder'=>'(All Tenants)']) }}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('sms_provider_id','Sms Provider:')!!}
            <div class="">
                {{ Form::select('sms_provider_id',$sms_providers,null,['class' => 'form-control','placeholder'=>'(All Sms Providers)']) }}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('to','To:')!!}
            <div class="">
                {!! Form::text('to',null,['placeholder'=>'Enter phone','class'=>'form-control'])!!}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('type','Types:')!!}
            <div class="">
                {!!Form::select('type',$types,null,
             ['class' => 'form-control','placeholder'=>'(All Types)'])!!}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!! Form::label('start_time', 'Start time :') !!}
            <div class="">
                {!! Form::date('start_time',null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!! Form::label('end_time', 'End time :') !!}
            <div class="">
                {!! Form::date('end_time',null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!!Form::label('status','Status:')!!}
            <div class="">
                {!!Form::select('status',['Unsuccessful','Successful'],null,
             ['class' => 'form-control','placeholder'=>'(All Status)'])!!}
            </div>
        </div>
    </div>
</div>
<span class="input-group-btn">
            <button class="btn btn-default-sm pull-right" type="submit">
                <i class="fa fa-search">Search</i>
            </button>
        </span>
{!! Form::close()!!}

