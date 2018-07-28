<div class="form-group">
      {!!Form::label('name', 'Name')!!}
      {!!Form::text('name',null,['placeholder'=>'Enter name','class'=>'form-control'])!!}
    {!! $errors->first('name', '<p style=color:red class="help-block">:message</p>') !!}
    </div>
    <div class="form-group">
      {!!Form::label('address', 'Address')!!}
      {!!Form::textarea('address',null,['placeholder'=>'Enter address','class'=>'form-control'])!!}
        {!! $errors->first('address', '<p style=color:red class="help-block">:message</p>') !!}
    </div>
    <div class="form-group">
      {!!Form::label('phone', 'Phone')!!}
      {!!Form::text('phone',null,['placeholder'=>'Enter phone','class'=>'form-control'])!!}
        {!! $errors->first('phone', '<p style=color:red class="help-block">:message</p>') !!}
    </div>
    <div class="form-group">
      {!!Form::label('website', 'Web site')!!}
      {!!Form::text('website',null,['placeholder'=>'Enter website','class'=>'form-control'])!!}
        {!! $errors->first('website', '<p style=color:red class="help-block">:message</p>') !!}
    </div>
    <div  class="form-group">
      {!!Form::label('email', 'Email')!!}
      {!!Form::text('email',null,['placeholder'=>'Enter email','class'=>'form-control'])!!}
        {!! $errors->first('email', '<p style=color:red class="help-block">:message </p>') !!}
    </div>
    <div class="form-group">
      {!!Form::label('logo', 'Logo')!!}
      {!!Form::file('logo',['class'=>'form-control'])!!}
        {!! $errors->first('logo', '<p style=color:red class="help-block">:message </p>') !!}
    </div>
<a href="/companies" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>

<button type="submit" class="btn btn-primary pull-right">
    <i class="fa fa-check"></i>Save
</button>