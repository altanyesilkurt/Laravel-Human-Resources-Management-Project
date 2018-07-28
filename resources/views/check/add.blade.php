<script>
    $(document).ready(function(){
        var i=2;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'">' +
                '<td><input type="date" name="date[]"  class="form-control " /</td>' +
                '<td><input type="text" name="number[]" placeholder="Enter name" class="form-control " /</td>' +
                '<td><input type="text" name="branch[]" placeholder="Enter branch" class="form-control " /</td>' +
                '<td><input type="text" name="currency[]" placeholder="Enter currency" class="form-control" /</td>' +
                '<td>{!!Form::number('amount',0,['name'=>'amount', 'placeholder'=>'0','class'=>'form-control'])!!}</td>' +
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('keydown keyup',function () {
            $("input").on("keydown keyup",function () {
                var total=0;
                $("input[name=amount]").each(function () {
                    total=total + parseFloat($(this).val());
                })
                $("input[name=total]").val(total);
            });
        });
        $(document).on('click','.btn_remove',function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
            var total=0;
            $("input[name=amount]").each(function () {
                total=total + parseFloat($(this).val());
            })
            $("input[name=total]").val(total);
        });
    });
</script>