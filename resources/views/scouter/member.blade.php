@extends('layouts.scouter')


@section('content')
    @if(Session::has('member_created'))

        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Great!</h4>
            {{ Session::get('member_created') }}
        </div>

    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="modal" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{ Form::open(['url' => 'organizations/update-member', 'method' => 'PATCH', 'class' => 'update-member-form']) }}
                <input type="hidden" name="organization_id" value="" id="update-member-org-id">
                <input type="hidden" name="id" value="" id="update-member-id">

                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('f-name', 'First Name *') }}
                        {{ Form::text('f_name', null, array('class' => 'form-control', 'id' => 'f-name')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('m-name', 'Middle Name') }}
                        {{ Form::text('m_name', null, array('class' => 'form-control', 'id' => 'm-name')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('l-name', 'Last Name *') }}
                        {{ Form::text('l_name', null, array('class' => 'form-control', 'id' => 'l-name')) }}
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-member-submit">Update</button>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Registration</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ url('/') }}"><i class="fa fa-institution"></i> Organization Detail</a></li>
                        <li><a href="{{ url('/scarf') }}"><i class="fa fa-lemon-o"></i> Scarf Detail</a></li>
                        <li class="active"><a href="{{ url('/committe') }}"><i class="fa fa-users"></i> Committe Member</a></li>
                        <li><a href="{{ url('scouter/scouter') }}"><i class="fa fa-user-plus"></i> Scouter Detail</a></li>
                        <li><a href="{{ url('/team') }}"><i class="fa fa-users"></i> Teams</a></li>
                        <li><a href="{{ url('/scouter/registration') }}"><i class="fa fa-calculator"></i> Registration Cost Detail</a></li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /. box -->


        </div>
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Committee Member Detail</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{--<form role="form" action="{{ url('organizations/member') }}" method="post" id="member-create-form" class="form-horizontal">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--@if(!empty($member))--}}

                        {{--{{ Form::model($member, ['url' => ['organizations/edit-member', $member->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'member-create-form']) }}--}}

                    {{--@else--}}

                {{ Form::open(['url' => 'organizations/member', 'class' => 'form-horizontal', 'id' =>'member-create-form']) }}

                    {{--@endif--}}
                    <input type="hidden" name="organization_id" id="org_id" value="{{ Session::get('org_id') }}">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
                            {{ Form::label('f-name', 'First Name *', array( 'class' => 'control-label col-sm-3')) }}
                            <div class="col-sm-4">
                                {{ Form::text('f_name', null, array('class' => 'form-control', 'id' => 'f-name')) }}
                                @if ($errors->has('f_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('f_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('m_name') ? ' has-error' : '' }}">
                            {{ Form::label('m-name', 'Middle Name', array( 'class' => 'control-label col-sm-3')) }}
                            <div class="col-sm-4">
                                {{ Form::text('m_name', null, array('class' => 'form-control', 'id' => 'm-name')) }}
                                @if ($errors->has('m_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('m_name') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('l_name') ? ' has-error' : '' }}">
                            {{ Form::label('l-name', 'Last Name *', array( 'class' => 'control-label col-sm-3')) }}
                            <div class="col-sm-4">
                                {{ Form::text('l_name', null, array('class' => 'form-control', 'id' => 'l-name')) }}
                                @if ($errors->has('l_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('l_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary pull-left" id="member-submit">Save</button>
                            <button type="button" href="{{ url('scouter/scouter') }}" class="btn btn-grey pull-right">NEXT</button>

                        </div>

                {{ Form::close() }}
                    @if(!empty($member))

                        <div class="box-footer">
                            <form action="{{ url('organizations/remove') }}" method="post" id="remove_many_members">
                                {{ csrf_field() }}
                                <table id="table-member" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><input name="action_to_all" type="checkbox" class="check-all"></th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-member">
                                        @foreach($member as $value)
                                            <tr>
                                                <td><input class="check-row" name="action_to[]" type="checkbox" value="{{ $value->id }}"></td>
                                                <td>{{ $value->f_name }}</td>
                                                <td>{{ $value->m_name }}</td>
                                                <td>{{ $value->l_name }}</td>
                                                <td>
                                                    <a class="updateMember" data-id="{{ $value->id }}">
                                                        <i class="fa fa-pencil"></i></a> |
                                                    <a class="deleteMember" data-id="{{ $value->id }}" href="{{ url( 'organizations/delete-member', [$value->id]) }}"><i class="fa fa-trash-o"></i></a>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                <div class="btn-toolbar list-toolbar">
                                    <button class="btn btn-danger" name="mass-delete" type="submit" id="delete-member">Delete</button>
                                </div>
                            </form>
                        </div>
                    @endif

                    </div>
            </div><!-- /.box -->

        </div>

    </div>
@stop

@section('scripts')

    @parent
    <script>
        var update_member_url = "<?php echo url('organizations/update-member'); ?>";
        var delete_member_url = "<?php echo url('organizations/delete-member'); ?>";
    </script>


@stop