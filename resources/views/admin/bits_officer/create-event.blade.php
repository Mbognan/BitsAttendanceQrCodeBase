@extends('admin.layouts.master')
<link href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">
<link href="">
<link href="">
@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Pending Account</h2>
            {{-- <button class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add item</button> --}}
        </div>
    </div>
</div>

<div class="row m-t-25">


    <div class="col-lg-12">
        <div class="table-data__tool">
            <div class="table-data__tool-left">

                <button class="au-btn-filter" data-toggle="modal" data-target="#mediumModal">
                    <i class="zmdi zmdi-filter-list"></i>Create Event</button>


            </div>

        </div>
        <div class="card">
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
          </div>

        </div>




    </div>

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
                    <div class="card-body">
                        <form action="{{ route('officer.storeEvent') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Event Title</label>
                                <input id="cc-pament" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Academic Year</label>
                                <select name="academic_year" id="select" class="form-control">
                                    <option >Please select</option>
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>

                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cc-exp" class="control-label mb-1">Year</label>
                                        <input id="cc-exp" name="year" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Ex.2021-2022" autocomplete="cc-exp">
                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="x_card_code" class="control-label mb-1">Status</label>
                                    <div class="input-group">
                                        <select name="status" id="select" class="form-control">
                                            <option >Please select</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

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
