<div class="form-group">
    {!!Form::text('to',null,['placeholder'=>'To:','class'=>'form-control'])!!}
    {!! $errors->first('to','<p style=color:red class="help-block">:message</p>') !!}
</div>
<div class="form-group">
     {!!Form::text('subject',null,['placeholder'=>'Subject:','class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::textarea('content',null,['placeholder'=>'Enter Message','class'=>'form-control'])!!}
</div>
{!! Form::button('<i class="fa fa-envelope-o"></i>Send',['class'=>'btn btn-info pull-right ','type'=>'submit']) !!}
