<div class="form-group">
    {!!Form::label('firstname', 'FirstName')!!}
    {!!Form::text('firstname',null,['placeholder'=>'Enter name','class'=>'form-control'])!!}
    {!! $errors->first('firstname','<p style=color:red class="help-block">:message</p>') !!}
</div>
      <div class="form-group">
      {!!Form::label('lastname','Lastname')!!}
      {!!Form::text('lastname',null,['placeholder'=>'Enter lastname','class'=>'form-control'])!!}
        {!! $errors->first('lastname','<p style=color:red class="help-block">:message</p>') !!}
    </div>
    <div class="form-group">
      {!! Form::label('phone','Phone')!!}
      {!! Form::text('phone',null,['placeholder'=>'Enter phone','class'=>'form-control'])!!}
        {!! $errors->first('phone','<p style=color:red class="help-block">:message</p>') !!}
    </div>
<div class="form-group">
    {!!Form::label('email','Email')!!}
    {!!Form::text('email',null,['placeholder'=>'Enter email','class'=>'form-control'])!!}
    {!! $errors->first('email','<p style=color:red class="help-block">:message</p>') !!}
</div>
    <div class="form-group">
    {!! Form::Label('company_id','Company:') !!}
        {{ Form::select('company_id',$companies,null,
    ['class' => 'form-control']) }}
        {!! $errors->first('company_id','<p style=color:red class="help-block">:message</p>') !!}
    </div>
<div class="form-group">
    {!! Form::Label('department_id','Department:') !!}
    {{ Form::select('department_id',$departments,null,
    ['class' => 'form-control']) }}
    {!! $errors->first('department_id','<p style=color:red class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::Label('branch_id','Branch:') !!}
    {{ Form::select('branch_id',$branches,null,
    ['class' => 'form-control']) }}
    {!! $errors->first('branch_id','<p style=color:red class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::Label('title_id','Title:') !!}
    {{ Form::select('title_id',$titles,null,
    ['class' => 'form-control']) }}
    {!! $errors->first('title_id','<p style=color:red class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::Label('status','Status:') !!}
    {!!Form::select('status',['Employee is  working','Employee is not working'],null,
    ['class' => 'form-control'])!!}

</div>
{!! Form::button('<i class="fa fa-check"></i>Save', ['class'=>'btn btn-info pull-right', 'type'=>'submit']) !!}