<script>
    var url = "{{url('projects/chart/data')}}";
    var Tenants = new Array();
    var Labels = new Array();
    $(document).ready(function(){
        $.get(url, function(response){
            response.forEach(function(data){
                Tenants.push(data.tenant_count);
                Labels.push(data.tenant.name);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:Labels,
                    datasets:[{
                        label:'Sms',
                        data: Tenants,
                        borderWidth:1
                    }]},
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true}
                        }]}
                }});
        });});
    $(document).ready(function() {
        var url = "{{url('projects/chart/data')}}";
        var Tenants = new Array();
        var Labels = new Array();
        $(document).ready(function(){
            $.get(url, function(response){
                response.forEach(function(data){
                    Tenants.push(data.tenant_count);
                    Labels.push(data.tenant.name);});
                var ctx1 = $("#doughnut-chartcanvas-1");
                var data1 = {
                    labels : Labels,
                    datasets : [
                        {label :Labels,
                            data : Tenants,
                            backgroundColor : [
                                "#CDA776",
                                "#989898",
                                "#cbad55",
                                "#e33837",
                                "#1D7A46",
                                "#111",
                                "#33FFFF",
                                "#0C40F1",
                                "#C70CF1",
                                "#DCF10C"],
                            borderColor : [
                                "#CDA776",
                                "#989898",
                                "#cbad55",
                                "#e33837",
                                "#1D7A46",
                                "#111",
                                "#33FFFF",
                                "#0C40F1",
                                "#C70CF1",
                                "#DCF10C"],
                            borderWidth : [1, 1, 1, 1, 1]
                        }]};
                var options = {
                    title : {
                        display : true,
                        position : "top",
                        text : "Doughnut Chart",
                        fontSize : 18,
                        fontColor : "#111"},
                    legend : {
                        display : true,
                        position : "bottom"
                    }};
                var chart1 = new Chart( ctx1, {
                    type : "doughnut",
                    data : data1,
                    options : options
                });});
        });});
</script>