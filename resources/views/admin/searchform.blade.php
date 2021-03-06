@extends('layouts.admin')

@section('content')

    <section class="content">
        {{ Form::open(['url' => 'admin/advanced-search', 'method' => 'POST', 'class' => 'advanced-form']) }}
        <div class="row">
            <div class="col-md-12">

                <div class="search-engine row">
                    <div class="col-md-8">
                        <input type="text" name="q" class="form-control" placeholder="Enter your keywords...">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Search</button>
                </div><!-- /.input-group -->

            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">By Person</h3>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="chairman"> Chairman
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="member"> Committe Member
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="scouter"> Scouter
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="team_member"> Unit member
                                </label>
                            </div>
                        </li>
                    </ul>

                </div>

            </div>


            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">By Unit</h3>
                    </div>


                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="checkbox" name="school">
                                <label>
                                    <input type="checkbox" name="organization"> Community

                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="school"> School / College
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="registration"> Registration No.
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="district"> District
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">By Units [Team]</h3>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="team"> Unit
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">By Year</h3>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="year"> Year
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        {{ Form::close() }}

    </section>

@stop


@section('scripts')

    @parent



@stop