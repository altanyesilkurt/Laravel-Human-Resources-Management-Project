<div class="form-group">
    {!!Form::label('name','Name')!!}
    {!!Form::text('name',null,['placeholder'=>'Enter name','class'=>'form-control'])!!}
    {!! $errors->first('name', '<p style=color:red class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::Label('company_id','Company:') !!}
    {{ Form::select('company_id',$companies,null,['class' => 'form-control']) }}

</div>
<div class="form-group">
    {!!Form::label('address','Address')!!}
    {!!Form::text('address',null,['placeholder'=>'Enter Address','class'=>'form-control'])!!}
    {!! $errors->first('address', '<p style=color:red class="help-block">:message</p>') !!}
</div>
{!! Form::button('<i class="fa fa-check"></i>Save', ['class'=>'btn btn-info pull-right', 'type'=>'submit']) !!}