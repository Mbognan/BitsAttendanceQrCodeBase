@extends('admin.layouts.master')

@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Welcome Student!</h2>

        </div>
    </div>
    <div class="col mt-4">
        <div class="sufee-alert alert  alert-warning ">
            <span class="badge badge-pill badge-warning">Warnig</span>
            Your account is Still Pending please wait for further instructions.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
</div>

@endsection
