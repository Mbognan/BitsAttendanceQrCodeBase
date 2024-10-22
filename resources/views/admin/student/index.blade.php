@extends('admin.layouts.master')

@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Welcome Student!</h2>

        </div>
    </div>
    @if ($valid->status == 1)
    <div class="col mt-4">

        <div class="sufee-alert alert  alert-success ">
            <span class="badge badge-pill badge-success">Verified</span>
            Please check your Email Address for Qr Code :) Thank you!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @php
    $overallTotalFines = 0;
@endphp

        <h3 class="title-3 m-b-30 mt-4">
            <i class="zmdi zmdi-account-calendar"></i>Your Attendance Log (Absent)</h3>
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Session</th>
                        <th class="text-right">Event</th>
                        <th class="text-right">Day</th>
                        <th class="text-right">Fines</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absentDetails as $detail)
                    @php

                    $fine = is_numeric($detail['fines']) ? (int)$detail['fines'] : 0;

                    $overallTotalFines += $fine;
                @endphp
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($detail['date'])->format('F j, Y') }}</td>
                            <td>{{ $detail['status'] }}</td>
                            <td>{{ $detail['session'] }}</td>
                            <td class="text-right">{{ $detail['event'] }}</td>
                            <td class="text-right">{{ $detail['day'] }}</td>
                            <td class="text-right">₱{{ $detail['fines'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 class="title-3 m-b-30 mt-4 bold">
                <i class="zmdi zmdi-account-"></i>Your Total Fines(Absent) : ₱{{ $overallTotalFines }}</h3>
        </div>
        @else
        <div class="sufee-alert alert  alert-warning ">
            <span class="badge badge-pill badge-warning">Warnig</span>
            Your account is Still Pending please wait for further instructions.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif

    </div>
</div>

@endsection
