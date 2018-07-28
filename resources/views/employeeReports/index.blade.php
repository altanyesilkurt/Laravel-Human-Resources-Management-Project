<?php /** @var \App\Employee[] $employees */ ?>
@extends('layouts.app')
@section('content')

        <div class="box">
            <div class="box-header">
                Employees
            </div>
            <div class="box-body">
                <a class="btn btn-secondary pull-right" href="employeeReports/create" style="margin-bottom:15px;">
                    <i style="color: blue" class="fa fa-plus"></i> Create New
                </a>
                @include('employeeReports.filters')

                <table class="table table-striped" style="width:100%" id="employees-table">
                    <thead class="">
                        <tr>
                            <th style="padding-left:15px;">#</th>
                            <th> FirstName</th>
                            <th> LastName</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Department</th>
                            <th>Branch</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th width="110px;">Action</th>
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
       $(function () {/*
            $('#export-button').click(function() {
                $(this).attr('href',  + $('#search-form').serialize());
            });
            $('#export-button2').click(function() {
                $(this).attr('href', + $('#search-form').serialize());
            });*/
            oTable = $('#employees-table').DataTable({
                "bFilter": false,
                processing: true,
                serverSide: true,
                ajax: {
                    url:  '{{ route('employeeData') }}',
                    data: function (d) {
                        d.id = $('#id').val();
                        d.firstname = $('#firstname').val();
                        d.lastname = $('#lastname').val();
                        d.phone = $('#phone').val();
                        d.email = $('#email').val();
                        d.company_id = $('#company_id').val();
                        d.department_id = $('#department_id').val();
                        d.branch_id = $('#branch_id').val();
                        d.title_id = $('#title_id').val();
                        d.status = $('#status').val();
                    }
                },
                columns: [
                    {data: 'id'},
                    {data: 'firstname'},
                    {data: 'lastname'},
                    {data: 'phone'},
                    {data: 'email'},
                    {data: 'company_id'},
                    {data: 'department_id'},
                    {data: 'branch_id'},
                    {data: 'title_id'},
                    {data: 'status'},
                    {data:'action'}
                ],
            });
            $('#search-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });
       });
    </script>
@endpush