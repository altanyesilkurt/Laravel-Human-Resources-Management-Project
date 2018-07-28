<?php /** @var \App\SmsLog[] $reports */ ?>
@extends('layouts.app')
@section('content')
        <div class="box">
            <div class="box-header">
                Report
            </div>
             <div class="dropdown pull-right">
                    <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a  href="#" id="export-button" class="dropdown-item" href="#">Export to Excel</a>
                        <a  href="#" id="export-button2" class="dropdown-item" href="#">Export to Pdf</a>
                    </div>
                </div>
             @include('reports.filters')
                <table class="table table-striped" style="width:100%" id="users-table">
                    <thead class="">
                    <tr>
                        <th style="padding-left:15px;">#</th>
                        <th> Tenant</th>
                        <th> SmsProvider</th>
                        <th>Type</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
@endsection
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#export-button').click(function() {
                $(this).attr('href', '{{ route('exports') }}?' + $('#search-form').serialize());
            });
            $('#export-button2').click(function() {
                $(this).attr('href', '{{ route('exportToPdf') }}?' + $('#search-form').serialize());
            });
            var oTable = $('#users-table').DataTable({
                "bFilter": false,
                processing: true,
                serverSide: true,
                ajax: {
                    url:  '{{ route('gridData') }}',
                    data: function (d) {
                        d.to = $('#to').val();
                        d.tenant_id = $('#tenant_id').val();
                        d.sms_provider_id = $('#sms_provider_id').val();
                        d.type = $('#type').val();
                        d.status = $('#status').val();
                        d.start_time = $('#start_time').val();
                        d.end_time = $('#end_time').val();
                    }
                },
                columns: [
                    {data: 'id'},
                    {data: 'tenant_id'},
                    {data: 'sms_provider_id'},
                    {data: 'type'},
                    {data: 'to'},
                    {data: 'status'},
                    {data: 'created_at'}
                ],
            });
            $('#search-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });
        });
    </script>
@endpush