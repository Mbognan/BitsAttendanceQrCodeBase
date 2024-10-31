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
                        $colspan = $numberOfDays * 6; // Adjust column span accordingly
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
                $totalAbsentCount = 0; // To keep track of total absents
                $totalFines =0;
            @endphp

            @foreach ($userGroupedRecords as $userId => $userAttendance)
                <tr>
                    <td style="border: 1px solid black; text-align: center;">
                        {{ $userAttendance->first()->user->first_name }} {{ $userAttendance->first()->user->last_name }}
                    </td>
                    @php
                        $overallTotalFines = 0; // Reset total fines for this user
                        $absentCount = 0; // Reset absent count for this user
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
                                            // Change logic to represent absent
                                            $morningLogin = ($record->login_log == 0 ? 1 : 0);
                                            $morningLogout = ($record->logout_log == 0 ? 1 : 0);
                                        }
                                        if ($record->session == 'Afternoon') {
                                            $hasAfternoonSession = true;
                                            // Change logic to represent absent
                                            $afternoonLogin = ($record->login_log == 0 ? 1 : 0);
                                            $afternoonLogout = ($record->logout_log == 0 ? 1 : 0);
                                        }
                                    }
                                }


                                if (!$foundRecord) {
                                    $absentCount += 1;
                                }

                                // Update total fines logic based on existing fines
                                $morningTotal = $hasMorningSession ? $morningLogin + $morningLogout : '-';
                                $afternoonTotal = $hasAfternoonSession ? $afternoonLogin + $afternoonLogout : '-';
                                if ($morningTotal === 1 || $afternoonTotal === 1) {
                                    $overallTotalFines += 25; // Assume a fine of 25 for being absent
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

                    @php
                        $totalAbsentCount += $absentCount; // Update total absent count globally
                    @endphp

                    <td style="border: 1px solid black; text-align: center;">
                        <strong>{{ $overallTotalFines }}</strong>
                    </td>
                    <td style="border: 1px solid black; text-align: center;">
                        <strong>{{ $absentCount }}</strong>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="border: 1px solid black; text-align: center;"><strong>TOTALS:</strong></td>
                @foreach ($groupedByEvent as $eventId => $records)
                    @foreach ($records->groupBy('event_day') as $event_day => $dayRecords)
                        <td colspan="6" style="border: 2px solid black; text-align: center;"></td>
                    @endforeach
                @endforeach
                <td style="border: 1px solid black; text-align: center;">
                    <strong>{{ $totalFines }}</strong> <!-- Overall total fines for all users -->
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <strong>{{ $totalAbsentCount }}</strong> <!-- Overall total absents for all users -->
                </td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
