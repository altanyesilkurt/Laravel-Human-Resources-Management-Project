<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("input").on( "keydown keyup" ,function () {
            var total=0;
            $("input[name=amount]").each(function () {
                total=total + parseInt($(this).val());
            })
            $("input[name=total]").val(total);
        });
    });
</script>