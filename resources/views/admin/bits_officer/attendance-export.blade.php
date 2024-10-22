<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
            text-align: center;
            border: 2px solid black;
        }

        th,
        td {
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
    <table>
        <thead>
            <!-- Main Title Row -->
            <tr>
                <th style="border: 2px solid black; text-align: center;" rowspan="4">NAMES</th>
                @php
                    // Group attendance by event
                    $groupedByEvent = $attendance->groupBy('event_record_id');
                @endphp

                @foreach ($groupedByEvent as $eventId => $records)
                    @php
                        $eventDays = $records->groupBy('event_day');
                        $numberOfDays = count($eventDays);
                        $colspan = $numberOfDays * 6;
                    @endphp
                    <th colspan="{{ $colspan }}" style="border: 2px solid black; text-align: center;">
                        Event: {{ $records->first()->event->title }}
                    </th>
                @endforeach
                <th rowspan="4" colspan="1" style="border: 2px solid black; text-align: center;">OVERALL TOTAL FINES</th>
            </tr>

            <!-- Event Day Row -->
            <tr>
                @foreach ($groupedByEvent as $eventId => $records)
                    @php
                        $eventDays = $records->groupBy('event_day');
                    @endphp
                    @foreach ($eventDays as $event_day => $userRecords)
                        <th colspan="6" style="border: 2px solid black; text-align: center;">
                            {{ $event_day }}
                        </th>
                    @endforeach
                @endforeach
            </tr>

            <!-- Morning & Afternoon Row -->
            <tr>
                @foreach ($groupedByEvent as $eventId => $records)
                    @foreach ($records->groupBy('event_day') as $event_day => $userRecords)
                        <th colspan="3" style="border: 2px solid black; text-align: center;">Morning</th>
                        <th colspan="3" style="border: 2px solid black; text-align: center;">Afternoon</th>
                    @endforeach
                @endforeach
            </tr>

            <!-- Session Headers -->
            <tr>
                @foreach ($groupedByEvent as $eventId => $records)
                    @foreach ($records->groupBy('event_day') as $event_day => $userRecords)
                        <th style="border: 2px solid black; text-align: center;">LOG IN</th>
                        <th style="border: 2px solid black; text-align: center;">LOG OUT</th>
                        <th style="text-align: center; border: 2px solid black; color: red;">TOTAL</th>
                        <th style="border: 2px solid black; text-align: center;">LOG IN</th>
                        <th style="border: 2px solid black; text-align: center;">LOG OUT</th>
                        <th style="text-align: center; border: 2px solid black; color: red;">TOTAL</th>
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
                        {{ $userAttendance->first()->user->first_name }} {{ $userAttendance->first()->user->last_name }}
                    </td>
                    @php

                        $overallTotalFines = 0;
                    @endphp

                    @foreach ($groupedByEvent as $eventId => $records)
                        @foreach ($records->groupBy('event_day') as $event_day => $dayRecords)
                            @php
                                $morningLogin = '-';
                                $morningLogout = '-';
                                $afternoonLogin = '-';
                                $afternoonLogout = '-';


                                $hasMorningSession = false;
                                $hasAfternoonSession = false;


                                $foundRecord = false;
                                foreach ($dayRecords as $record) {
                                    if ($record->user_id == $userId) {
                                        $foundRecord = true;
                                        if ($record->session == 'Morning') {
                                            $hasMorningSession = true;
                                            $morningLogin = ($record->login_log == 0 ? 25 : ($record->login_log == 1 ? 0 : $record->login_log));
                                            $morningLogout = ($record->logout_log == 0 ? 25 : ($record->logout_log == 1 ? 0 : $record->logout_log));
                                        }
                                        if ($record->session == 'Afternoon') {
                                            $hasAfternoonSession = true;
                                            $afternoonLogin = ($record->login_log == 0 ? 25 : ($record->login_log == 1 ? 0 : $record->login_log));
                                            $afternoonLogout = ($record->logout_log == 0 ? 25 : ($record->logout_log == 1 ? 0 : $record->logout_log));
                                        }
                                    }
                                }

                                $morningTotal = $hasMorningSession ? $morningLogin + $morningLogout : '-';
                                $afternoonTotal = $hasAfternoonSession ? $afternoonLogin + $afternoonLogout : '-';


                                if ($hasMorningSession || $hasAfternoonSession) {
                                    $overallTotalFines += ($morningTotal !== '-' ? $morningTotal : 0) + ($afternoonTotal !== '-' ? $afternoonTotal : 0);
                                }
                            @endphp

                            <!-- Morning Session Columns -->
                            <td style="border: 1px solid black; text-align: center;">
                                {{ $hasMorningSession ? $morningLogin : '-' }}
                            </td>
                            <td style="border: 1px solid black; text-align: center;">
                                {{ $hasMorningSession ? $morningLogout : '-' }}
                            </td>
                            <td style="border: 1px solid black; color: red; text-align: center;">
                                <b>{{ $morningTotal }}</b>
                            </td>

                            <!-- Afternoon Session Columns -->
                            <td style="border: 1px solid black; text-align: center;">
                                {{ $hasAfternoonSession ? $afternoonLogin : '-' }}
                            </td>
                            <td style="border: 1px solid black; text-align: center;">
                                {{ $hasAfternoonSession ? $afternoonLogout : '-' }}
                            </td>
                            <td style="border: 1px solid black; color: red; text-align: center;">
                                <b>{{ $afternoonTotal }}</b>
                            </td>
                        @endforeach
                    @endforeach

                    <td style="border: 1px solid black; text-align: center;">
                        <strong>{{ $overallTotalFines }}</strong>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
