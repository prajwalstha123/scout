@extends('layouts.admin')

@section('content')


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">@if(count($organizations) > 0) {{ 'All Units' }}@else {{ 'No Records Found' }} @endif</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">

                        @if(count($organizations) > 0)
                            <div class="table-responsive">
                                <table id="table-approved-organizations" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Registration No.</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Chairperson</th>
                                        <th>District</th>
                                        <th>Contact No.</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-approved-organizations">

                                        @foreach($organizations as $value)
                                            <tr>
                                                <td>{{ $value->registration_no }}</td>
                                                <td><a data-toggle="tooltip" title="VIEW" href="{{ url('admin/view-approved-organization', [$value->original_id]) }}">{{ $value->name }}</a></td>
                                                <td>{{ $value->type }}</td>
                                                <td>{{ $value->chairman_f_name . ' ' . $value->chairman_l_name }}</td>
                                                <td>{{ $value->dist_name }}</td>
                                                <td>{{ $value->tel_no }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        @endif
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>

@stop

@section('scripts')
    @parent

    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>

        $('#table-approved-organizations').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    </script>


@stop