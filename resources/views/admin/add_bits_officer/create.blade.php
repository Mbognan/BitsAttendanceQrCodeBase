@extends('admin.layouts.master')
@section('contents')
<div class="row">
    <div class="col-md-12 mb-4 mt-4">
        <div class="overview-wrap">
            <h2 class="title-1">Add Bits Officer Account Section</h2>
            {{-- <button class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add item</button> --}}
        </div>
    </div>

    <div class="col-lg-12   ">
        <div class="card">
            <div class="card-header">
                <strong>Icon/Text</strong> Groups
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-4">
                            <div class="input-group mb-4">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" id="input1-group1" name="first_name" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" id="input1-group1" name="middle_initial" placeholder="Middle Initials" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" id="input1-group1" name="last_name" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                <input type="text" id="input1-group1" name="student_id" placeholder="Student ID" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="email" id="input1-group1" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-6 mt-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <input type="password" id="input1-group1" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    {{-- <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="email" id="input2-group1" name="input2-group1" placeholder="Email" class="form-control">
                                <div class="input-group-addon">
                                    <i class="far fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </form>
            </div>

        </div>
    </div>
</div>


@endsection
