@extends('admin.layouts.master')
<link href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">
<link href="">
<link href="">
@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Add Bits Officer Section</h2>
            {{-- <button class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add item</button> --}}
        </div>
    </div>
</div>

<div class="row m-t-25">


    <div class="col-lg-12">
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">

                </div>
                <div class="rs-select2--light rs-select2--sm">

                </div>

            </div>
            <div class="table-data__tool-right">
                <button data-toggle="modal" data-target="#mediumModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add User</button>

            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
          </div>

        </div>




    </div>
    {{-- <div class="col-lg-6">
        <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
            <div class="au-card-inner">
                <div class="table-responsive">
                    <table class="table table-top-countries">
                        <tbody>
                            <tr>
                                <td>United States</td>
                                <td class="text-right">$119,366.96</td>
                            </tr>
                            <tr>
                                <td>Australia</td>
                                <td class="text-right">$70,261.65</td>
                            </tr>
                            <tr>
                                <td>United Kingdom</td>
                                <td class="text-right">$46,399.22</td>
                            </tr>
                            <tr>
                                <td>Turkey</td>
                                <td class="text-right">$35,364.90</td>
                            </tr>
                            <tr>
                                <td>Germany</td>
                                <td class="text-right">$20,366.96</td>
                            </tr>
                            <tr>
                                <td>France</td>
                                <td class="text-right">$10,366.96</td>
                            </tr>
                            <tr>
                                <td>Australia</td>
                                <td class="text-right">$5,366.96</td>
                            </tr>
                            <tr>
                                <td>Italy</td>
                                <td class="text-right">$1639.32</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@endsection
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Create Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="col-lg-12   ">
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
                                        <input type="text" id="input1-group1" name="middle_initial" placeholder="Middle Name" class="form-control">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
        </div>
    </div>
</div>
@push('scripts')


{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script>

@endpush
