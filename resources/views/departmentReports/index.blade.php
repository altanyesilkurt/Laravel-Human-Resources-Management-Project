<?php /** @var \App\Department[] $departments */ ?>
@extends('layouts.app')
@section('content')

        <div class="box">
            <div class="box-header">
                Departments
            </div>
            <div class="box-body">
                </hr>
                <a class="btn btn-secondary pull-right" href="departmentReports/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus"></i>Create New</a>
             @include('departmentReports.filters')
                <table class="table table-striped" style="width:100%" id="departments-table">
                    <thead class="">
                    <tr>
                        <th style="padding-left:15px;">#</th>
                        <th> DepartmentName </th>
                        <th> Company </th>
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
          $(function () { /*
               $('#export-button').click(function() {
                   $(this).attr('href',  + $('#search-form').serialize());
               });
               $('#export-button2').click(function() {
                   $(this).attr('href', + $('#search-form').serialize());
               });*/
              oTable = $('#departments-table').DataTable({
                  "bFilter": false,
                  processing: true,
                  serverSide: true,
                  ajax: {
                      url: '{{ route('departmentData') }}',
                      data: function (d) {
                          d.id = $('#id').val();
                          d.name = $('#name').val();
                          d.company_id = $('#company_id').val();
                      }
                  },
                  columns: [
                      {data: 'id'},
                      {data: 'name'},
                      {data: 'company_id'},
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