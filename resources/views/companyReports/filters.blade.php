{!! Form::open(['method'=>'GET','id'=>'search-form','url'=>'companyReports','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="col-xs-3 col-sm-3 col-md-3 pull-right">
    <div class="form-group">
        {!!Form::label('name','Name:')!!}
        <div class="">
            {!! Form::text('name',null,['placeholder'=>'Search name ...','class'=>'form-control'])!!}
        </div>
    </div>
    <span class="input-group-btn ">
            <button class="btn btn-default-sm pull-right" type="submit">
                <i class="fa fa-search">Search</i>
            </button>
        </span>
</div>
</div>
{!! Form::close()!!}
