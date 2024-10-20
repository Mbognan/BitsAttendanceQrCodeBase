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
                <th style="border: 2px solid black; text-align: center;" rowspan="3">NAMES</th>
                @php
                    // Group attendance by event
                    $groupedByEvent = $attendance->groupBy('event_record_id');
                @endphp

                @foreach ($groupedByEvent as $eventId => $records)
                    @php
                        $eventDays = $records->groupBy('event_day'); // Group by event_day
                        $numberOfDays = count($eventDays); // Get the number of unique event_days
                        $colspan = $numberOfDays * 6; // Calculate colspan dynamically (6 columns per day)
                    @endphp
                    <th colspan="{{ $colspan }}" style="border: 2px solid black; text-align: center;">
                        Event: {{ $records->first()->event->title }}
                    </th>
                @endforeach
                <th rowspan="3" colspan="1" style="border: 2px solid black; text-align: center;">OVERALL TOTAL FINES</th>
            </tr>

            <!-- Event Day Row -->
            <tr>
                @foreach ($groupedByEvent as $eventId => $records)
                    @php
                        $eventDays = $records->groupBy('event_day'); // Group by event_day
                    @endphp
                    @foreach ($eventDays as $event_day => $userRecords)
                        <th colspan="6" style="border: 2px solid black; text-align: center;">
                            {{ $event_day }}
                        </th>
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
                // Collect user attendance grouped by user
                $userGroupedRecords = $attendance->groupBy('user_id');
            @endphp

            @foreach ($userGroupedRecords as $userId => $userAttendance)
                <tr>
                    <td style="border: 1px solid black; text-align: center;">
                        {{ $userAttendance->first()->user->first_name }} {{ $userAttendance->first()->user->last_name }}
                    </td>
                    @php
                        // Initialize overall fines for this user
                        $overallTotalFines = 0;
                    @endphp

                    @foreach ($groupedByEvent as $eventId => $records)
                        @foreach ($records->groupBy('event_day') as $event_day => $dayRecords)
                            @php
                                $morningLogin = 0;
                                $morningLogout = 0;
                                $afternoonLogin = 0;
                                $afternoonLogout = 0;

                                // Calculate totals for this user on this day
                                $foundRecord = false; // Track if the user has records for this event/day
                                foreach ($dayRecords as $record) {
                                    if ($record->user_id == $userId) {
                                        $foundRecord = true; // Found a record for this user
                                        if ($record->session == 'Morning') {
                                            $morningLogin += ($record->login_log == 0 ? 25 : ($record->login_log == 1 ? 0 : $record->login_log));
                                            $morningLogout += ($record->logout_log == 0 ? 25 : ($record->logout_log == 1 ? 0 : $record->logout_log));
                                        }
                                        if ($record->session == 'Afternoon') {
                                            $afternoonLogin += ($record->login_log == 0 ? 25 : ($record->login_log == 1 ? 0 : $record->login_log));
                                            $afternoonLogout += ($record->logout_log == 0 ? 25 : ($record->logout_log == 1 ? 0 : $record->logout_log));
                                        }
                                    }
                                }

                                $morningTotal = $morningLogin + $morningLogout;
                                $afternoonTotal = $afternoonLogin + $afternoonLogout;

                                // Calculate the overall total fines for this user
                                $overallTotalFines += $morningTotal + $afternoonTotal;
                            @endphp

                            <td style="border: 1px solid black; text-align: center;">
                                {{ $foundRecord ? $morningLogin : '-' }}
                            </td>
                            <td style="border: 1px solid black; text-align: center;">
                                {{ $foundRecord ? $morningLogout : '-' }}
                            </td>
                            <td style="border: 1px solid black; color: red; text-align: center;">
                                <b>{{ $foundRecord ? $morningTotal : '-' }}</b>
                            </td>
                            <td style="border: 1px solid black; text-align: center;">
                                {{ $foundRecord ? $afternoonLogin : '-' }}
                            </td>
                            <td style="border: 1px solid black; text-align: center;">
                                {{ $foundRecord ? $afternoonLogout : '-' }}
                            </td>
                            <td style="border: 1px solid black; color: red; text-align: center;">
                                <b>{{ $foundRecord ? $afternoonTotal : '-' }}</b>
                            </td>
                        @endforeach
                    @endforeach

                    <td  style="border: 1px solid black; text-align: center;">
                        <strong>{{ $overallTotalFines }}</strong>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
