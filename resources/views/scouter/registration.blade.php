@extends('layouts.scouter')


@section('content')
    <div class="row">
        <div class="col-md-3">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Registration</h3>
                </div>
                @include('partials/nav')
            </div><!-- /. box -->


        </div>
        <div class="col-md-9">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Registration Cost Detail {{ isset($organization) ? ': '. $organization->name : '' }}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">

                    <table id="table-registration-detail" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Number</th>
                                <th>Rate</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="list-registration-detail">

                            <tr>
                                <th>Unit Registration/Registration</th>
                                <td>-</td>
                                <td>{{ 'Rs. '. $rates->registration_rate }}</td>
                                <td>{{ 'Rs. '. $rates->registration_rate }}</td>
                            </tr>

                            <tr>
                                <th>Scouter</th>
                                <td>{{ $scouter }}</td>
                                <td>{{ 'Rs. '. $rates->scouter_rate }}</td>
                                <td>{{ 'Rs. ' . ($scouter * $rates->scouter_rate) }}</td>
                            </tr>

                            <tr>
                                <th>Scout</th>
                                <td>{{ $scout }}</td>
                                <td>{{ 'Rs. '. $rates->team_rate }}</td>
                                <td>{{ 'Rs. '. ($scout * $rates->team_rate) }}</td>
                            </tr>

                            <tr>
                                <th>Unit Commitee Member</th>
                                <td>{{ $member }}</td>
                                <td>{{ 'Rs. ' . $rates->committee_members_rate }}</td>
                                <td>{{ 'Rs. ' . ($member * $rates->committee_members_rate) }}</td>
                            </tr>

                            <tr>
                                <th>Disaster Management Trust</th>
                                <td>{{ $total }}</td>
                                <td>{{ 'Rs. ' . $rates->disaster_mgmt_trust_rate }}</td>
                                <td>{{ 'Rs. ' . ($total * $rates->disaster_mgmt_trust_rate) }}</td>
                            </tr>

                        </tbody>

                    </table>

                </div>
                <div class="box-footer">

                    <div class="pull-right">
                        @if ($organization->is_submitted == false)

                            {{ Form::open(['url' => 'organizations/submit', 'method' => 'PATCH', 'class' => 'submit-membership']) }}
                                <input type="hidden" name="organization_id" id="org_id" value="{{ $organization->id or null }}">
                                <button type="submit" class="btn btn-primary final-submit"></i> Submit For Review</button>

                            {{ Form::close() }}

                        @endif
                        {{ link_to('scouter/print', 'PRINT', array('class' => 'btn btn-info', 'target'  => '_blank')) }}
                    </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@stop

@section('scripts')


    @parent


@stop