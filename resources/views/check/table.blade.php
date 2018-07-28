<div class="container col-xs-12 col-sm-12 col-md-12 ">
    <div class="form-group ">
        <form name="add_name" id="add_name">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <thead class="">
                    <tr>
                        <th style="padding-left:15px;">Cheque Date</th>
                        <th> Cheque Number  </th>
                        <th> Drawee Bank/Branch  </th>
                        <th>Currency</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td>
                            {!!Form::Date('cheque_date',null,['class'=>'form-control'])!!}
                            {!! $errors->first('cheque_date', '<p style=color:red class="help-block">:message</p>') !!}
                        </td>
                        <td>
                            {!!Form::text('cheque_number',null,['placeholder'=>'Enter number','class'=>'form-control'])!!}
                            {!! $errors->first('cheque_number', '<p style=color:red class="help-block">:message</p>') !!}
                        </td>
                        <td>
                            {!!Form::text('branch',null,['placeholder'=>'Enter branch','class'=>'form-control'])!!}
                            {!! $errors->first('branch', '<p style=color:red class="help-block">:message</p>') !!}
                        </td>
                        <td>
                            {!!Form::text('currency',null,['placeholder'=>'Enter currency','class'=>'form-control'])!!}
                            {!! $errors->first('currency', '<p style=color:red class="help-block">:message</p>') !!}
                        </td>
                        <td>
                            {!!Form::number('amount',0,['name'=>'amount', 'placeholder'=>'0','class'=>'form-control'])!!}
                            {!! $errors->first('amount','<p style=color:red class="help-block">:message</p>') !!}
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>