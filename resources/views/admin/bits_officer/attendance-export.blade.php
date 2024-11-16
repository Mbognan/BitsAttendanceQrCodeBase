{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $yearLevel }} Year Attendance Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
            text-align: center;
            border: 2px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <h2>{{ $yearLevel }} Year Attendance</h2> <!-- Display Year Level -->

    <table>
        <thead>
            <!-- Main Title Row -->
            <tr>
                <th style="border: 2px solid black; text-align: center;" rowspan="4">NAMES</th>
                @php
                    $groupedByEvent = $attendance->groupBy('event_record_id');
                @endphp
                @foreach ($groupedByEvent as $eventId => $records)
                    @php
                        $eventDays = $records->groupBy('event_day');
                        $numberOfDays = count($eventDays);
                        $colspan = $numberOfDays * 4;
                    @endphp
                    <th colspan="{{ $colspan }}" style="border: 2px solid black; text-align: center;">
                        Event: {{ $records->first()->event->title }}
                    </th>
                @endforeach
                <th rowspan="4" colspan="1" style="border: 2px solid black; text-align: center;">OVERALL TOTAL FINES</th>
                <th rowspan="4" colspan="1" style="border: 2px solid black; text-align: center;">TOTAL ABSENT</th>
            </tr>

            <!-- Event Day Row -->
            <tr>
                @foreach ($groupedByEvent as $eventId => $records)
                    @php
                        $eventDays = $records->groupBy(function($record) {
                            return \Carbon\Carbon::parse($record->created_at)->format('m-d-Y');
                        });
                    @endphp
                    @foreach ($eventDays as $event_day => $userRecords)
                        <th colspan="4" style="border: 2px solid black; text-align: center;">
                            {{ \Carbon\Carbon::createFromFormat('m-d-Y', $event_day)->format('F d, Y') }}
                        </th>
                    @endforeach
                @endforeach
            </tr>

            <!-- Morning & Afternoon Row -->
            <tr>
                @foreach ($groupedByEvent as $eventId => $records)
                    @foreach ($records->groupBy('event_day') as $event_day => $userRecords)
                        <th colspan="2" style="border: 2px solid black; text-align: center;">Morning</th>
                        <th colspan="2" style="border: 2px solid black; text-align: center;">Afternoon</th>
                    @endforeach
                @endforeach
            </tr>

            <!-- Session Headers -->
            <tr>
                @foreach ($groupedByEvent as $eventId => $records)
                    @foreach ($records->groupBy('event_day') as $event_day => $userRecords)
                        <th style="border: 2px solid black; text-align: center;">LOG IN</th>
                        <th style="border: 2px solid black; text-align: center;">LOG OUT</th>
                        <th style="border: 2px solid black; text-align: center;">LOG IN</th>
                        <th style="border: 2px solid black; text-align: center;">LOG OUT</th>
                    @endforeach
                @endforeach
            </tr>
        </thead>

        <!-- User Rows -->
        <tbody>
            @php
                $userGroupedRecords = $attendance->groupBy('user_id');
            @endphp

            @foreach ($userGroupedRecords as $userId => $userAttendance)
                <tr>
                    <td style="border: 1px solid black; text-align: center;">
                        {{ $userAttendance->first()->user->last_name }}, {{ $userAttendance->first()->user->first_name }}
                    </td>
                    @php
                        $overallTotalFines = 0;
                        $absentCount = 0;
                    @endphp

                    @foreach ($groupedByEvent as $eventId => $records)
                        @foreach ($records->groupBy('event_day') as $event_day => $dayRecords)
                            @php
                                $morningLogin = '-';
                                $morningLogout = '-';
                                $afternoonLogin = '-';
                                $afternoonLogout = '-';
                                $morningAbsences = 0;
                                $afternoonAbsences = 0;

                                foreach ($dayRecords as $record) {
                                    if ($record->user_id == $userId) {
                                        if ($record->session == 'morning') {
                                            $morningLogin = ($record->login_log == 0 ? 1 : 0);
                                            $morningLogout = ($record->logout_log == 0 ? 1 : 0);
                                            $morningAbsences = $morningLogin + $morningLogout;
                                        }
                                        if ($record->session == 'afternoon') {
                                            $afternoonLogin = ($record->login_log == 0 ? 1 : 0);
                                            $afternoonLogout = ($record->logout_log == 0 ? 1 : 0);
                                            $afternoonAbsences = $afternoonLogin + $afternoonLogout;
                                        }
                                    }
                                }

                                $absentCount += $morningAbsences + $afternoonAbsences;
                                $overallTotalFines += 25 * ($morningAbsences + $afternoonAbsences);
                            @endphp

                            <!-- Morning Session Columns -->
                            <td style="border: 1px solid black; text-align: center;">{{ $morningLogin }}</td>
                            <td style="border: 1px solid black; text-align: center;">{{ $morningLogout }}</td>

                            <!-- Afternoon Session Columns -->
                            <td style="border: 1px solid black; text-align: center;">{{ $afternoonLogin }}</td>
                            <td style="border: 1px solid black; text-align: center;">{{ $afternoonLogout }}</td>
                        @endforeach
                    @endforeach

                    <td style="border: 1px solid black; text-align: center;"><strong>{{ $overallTotalFines }}</strong></td>
                    <td style="border: 1px solid black; text-align: center;"><strong>{{ $absentCount }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}

<title>{{ $yearLevel }} Attendance Table</title>
<table>
    <thead>
        <!-- Main Title Row -->
        <tr>
            <th style="border: 2px solid black; text-align: center;" rowspan="4">No.</th> <!-- New Numbering Column -->
            <th style="border: 2px solid black; text-align: center;" rowspan="4">NAMES</th>
            @php
                $groupedByEvent = $attendance->groupBy('event_record_id');
            @endphp
            @foreach ($groupedByEvent as $eventId => $records)
                @php
                    $eventDays = $records->groupBy('event_day');
                    $numberOfDays = count($eventDays);
                    $colspan = $numberOfDays * 4;
                @endphp
                <th colspan="{{ $colspan }}" style="border: 2px solid black; text-align: center;">
                    Event: {{ $records->first()->event->title }}
                </th>
            @endforeach
            <th rowspan="4" colspan="1" style="border: 2px solid black; text-align: center;">OVERALL TOTAL FINES</th>
            <th rowspan="4" colspan="1" style="border: 2px solid black; text-align: center;">TOTAL ABSENT</th>
        </tr>

        <!-- Event Day Row -->
        <tr>
            @foreach ($groupedByEvent as $eventId => $records)
                @php
                    $eventDays = $records->groupBy(function($record) {
                        return \Carbon\Carbon::parse($record->created_at)->format('m-d-Y');
                    });
                @endphp
                @foreach ($eventDays as $event_day => $userRecords)
                    <th colspan="4" style="border: 2px solid black; text-align: center;">
                        {{ \Carbon\Carbon::createFromFormat('m-d-Y', $event_day)->format('F d, Y') }}
                    </th>
                @endforeach
            @endforeach
        </tr>

        <!-- Morning & Afternoon Row -->
        <tr>
            @foreach ($groupedByEvent as $eventId => $records)
                @foreach ($records->groupBy('event_day') as $event_day => $userRecords)
                    <th colspan="2" style="border: 2px solid black; text-align: center;">Morning</th>
                    <th colspan="2" style="border: 2px solid black; text-align: center;">Afternoon</th>
                @endforeach
            @endforeach
        </tr>

        <!-- Session Headers -->
        <tr>
            @foreach ($groupedByEvent as $eventId => $records)
                @foreach ($records->groupBy('event_day') as $event_day => $userRecords)
                    <th style="border: 2px solid black; text-align: center;">LOG IN</th>
                    <th style="border: 2px solid black; text-align: center;">LOG OUT</th>
                    <th style="border: 2px solid black; text-align: center;">LOG IN</th>
                    <th style="border: 2px solid black; text-align: center;">LOG OUT</th>
                @endforeach
            @endforeach
        </tr>
    </thead>

    <!-- User Rows -->
    <tbody>
        @php
            // Sort the users by last name
            $sortedUsers = $attendance->groupBy('user_id')->sortBy(function ($records) {
                return $records->first()->user->last_name;
            });

            $rowNumber = 1; // Initialize row number counter
        @endphp

        @foreach ($sortedUsers as $userId => $userAttendance)
            <tr>
                <!-- Display Row Number -->
                <td style="border: 1px solid black; text-align: center;">{{ $rowNumber++ }}</td>

                <!-- Display User Name -->
                <td style="border: 1px solid black; text-align: center;">
                    {{ $userAttendance->first()->user->last_name }}, {{ $userAttendance->first()->user->first_name }}
                </td>

                @php
                    $overallTotalFines = 0;
                    $absentCount = 0;
                @endphp

                @foreach ($groupedByEvent as $eventId => $records)
                    @foreach ($records->groupBy('event_day') as $event_day => $dayRecords)
                        @php
                            $morningLogin = '-';
                            $morningLogout = '-';
                            $afternoonLogin = '-';
                            $afternoonLogout = '-';
                            $morningAbsences = 0;
                            $afternoonAbsences = 0;

                            foreach ($dayRecords as $record) {
                                if ($record->user_id == $userId) {
                                    if ($record->session == 'morning') {
                                        $morningLogin = ($record->login_log == 0 ? 1 : 0);
                                        $morningLogout = ($record->logout_log == 0 ? 1 : 0);
                                        $morningAbsences = $morningLogin + $morningLogout;
                                    }
                                    if ($record->session == 'afternoon') {
                                        $afternoonLogin = ($record->login_log == 0 ? 1 : 0);
                                        $afternoonLogout = ($record->logout_log == 0 ? 1 : 0);
                                        $afternoonAbsences = $afternoonLogin + $afternoonLogout;
                                    }
                                }
                            }

                            $absentCount += $morningAbsences + $afternoonAbsences;
                            $overallTotalFines += 25 * ($morningAbsences + $afternoonAbsences);
                        @endphp

                        <!-- Morning Session Columns -->
                        <td style="border: 1px solid black; text-align: center;">{{ $morningLogin }}</td>
                        <td style="border: 1px solid black; text-align: center;">{{ $morningLogout }}</td>

                        <!-- Afternoon Session Columns -->
                        <td style="border: 1px solid black; text-align: center;">{{ $afternoonLogin }}</td>
                        <td style="border: 1px solid black; text-align: center;">{{ $afternoonLogout }}</td>
                    @endforeach
                @endforeach

                <td style="border: 1px solid black; text-align: center;"><strong>{{ $overallTotalFines }}</strong></td>
                <td style="border: 1px solid black; text-align: center;"><strong>{{ $absentCount }}</strong></td>
            </tr>
        @endforeach
    </tbody>
</table>
