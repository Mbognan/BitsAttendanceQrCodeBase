@extends('admin.layouts.master')
<link href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">
<link href="">
<link href="">
@section('contents')
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Promotion Section</h2>
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


@endsection
@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script>

@endpush
