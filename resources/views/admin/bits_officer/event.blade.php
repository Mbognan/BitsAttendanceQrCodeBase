@extends('admin.layouts.master')
<link href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Attendance Records</h2>
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
                    <span class="text-danger">* Required</span>
                    <select class="js-select2" name="time">
                        <option selected="selected"> Academic Year</option>
                        <option value="">1st Semester </option>
                        <option value="">Second Semester</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Year</option>
                        <option value="">2022-2023 </option>
                        <option value="">2024-2025</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>

                    <a href="{{ route('officer.export') }}" class="au-btn-filter">
                        <i class="fa fa-print"></i>Import Event Records</a>
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
@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script>

@endpush
