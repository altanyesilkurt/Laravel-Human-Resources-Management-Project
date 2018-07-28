<div class="form-group">
    {!!Form::label('name', 'Name')!!}
    {!!Form::text('name',null,['placeholder'=>'Enter name','class'=>'form-control'])!!}
    {!! $errors->first('name', '<p style=color:red class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::label('phone','Phone')!!}
    {!! Form::text('phone',null,['placeholder'=>'Enter phone','class'=>'form-control'])!!}
    {!! $errors->first('phone','<p style=color:red class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::Label('company_id','Company:') !!}
    {{ Form::select('company_id',$companies,null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {!!Form::label('cv', 'UPLOAD_CV:')!!}
    {!!Form::file('cv',['class'=>'form-control'])!!}
    {!! $errors->first('cv','<p style=color:red class="help-block">:message</p>') !!}
</div>
{!! Form::button('<i class="fa fa-check"></i>Save', ['class'=>'btn btn-info pull-right', 'type'=>'submit']) !!}