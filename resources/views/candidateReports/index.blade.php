<?php /** @var \App\candidate[] $candidates */ ?>
@extends('layouts.app')
@section('content')
        <div class="box">
            <div class="box-header">
                Candidates
            </div>
            <div class="box-body">
                </hr>
                <a class="btn btn-secondary pull-right" href="candidateReports/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus"></i>Create New</a>
                  @include('candidateReports.filters')
                <table class="table table-striped" style="width:100%" id="candidates-table">
                    <thead class="">
                    <tr>
                        <th style="padding-left:15px;">#</th>
                        <th> Name  </th>
                        <th> Phone  </th>
                        <th> Company  </th>
                        <th> CV  </th>
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
            oTable = $('#candidates-table').DataTable({
                "bFilter": false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('Data') }}',
                    data: function (d) {
                        d.id = $('#id').val();
                        d.name = $('#name').val();
                        d.phone = $('#phone').val();
                        d.company_id = $('#company_id').val();
                        d.cv = $('#cv').val();
                    }
                },
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'phone'},
                    {data: 'company_id'},
                    {data: 'cv'},
                    {data: 'action'}
                ],
            });
            $('#search-form').on('submit', function (e) {
                oTable.draw();
                e.preventDefault();
            });
        });
    </script>
@endpush
