    @extends('layouts.app')
    @section('content')
            <div class="box">
                <div class="box-header">
                    Companies
                </div>
                <div class="box-body">
                    <a class="btn btn-secondary pull-right" href="companyReports/create" style="margin-bottom:15px;"><i style="color: blue" class="fa fa-plus "></i>Create New</a>
       @include('companyReports.filters')
                    <table class="table table-striped" style="width:100%" id="companies-table">
                        <thead class="">
                          <tr>
                            <th style="padding-left:15px;">#</th>
                          <th> Name  </th>
                          <th> Address  </th>
                          <th>Phone</th>
                          <th>Web site</th>
                          <th>Email</th>
                          <th>Logo</th>
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
               $(function () {
                   /*
               }
                   $('#export-button').click(function() {
                       $(this).attr('href',  + $('#search-form').serialize());
                   });
                   $('#export-button2').click(function() {
                       $(this).attr('href', + $('#search-form').serialize());
                   });*/
                   oTable = $('#companies-table').DataTable({
                       "bFilter": false,
                       processing: true,
                       serverSide: true,
                       ajax: {
                           url: '{{route('companyData')}}',
                           data: function (d) {
                               d.id = $('#id').val();
                               d.name = $('#name').val();
                               d.address = $('#address').val();
                               d.phone = $('#phone').val();
                               d.website = $('#website').val();
                               d.email = $('#email').val();
                               d.logo = $('#logo').val();
                           }
                       },
                       columns: [
                           {data: 'id'},
                           {data: 'name'},
                           {data: 'address'},
                           {data: 'phone'},
                           {data: 'website'},
                           {data: 'email'},
                           {data: 'logo'},
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