<?php ?>
@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chart</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="canvas" style="height:350px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Donut Chart</h3>
                        <div class="chart-container">
                            <div class="doughnut-chart-container">
                                <canvas id="doughnut-chartcanvas-1" style="height:450px" ></canvas>
                            </div>
                        </div>
                        <!-- javascript -->
                        <script src="js/Chart.min.js"></script>
                        <script src="js/doughnut-db-php.js"></script>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        </div>
    </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
   @include('charts.chartscript')
@endsection