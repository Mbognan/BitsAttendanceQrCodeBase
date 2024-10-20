<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Table</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
            text-align: center;
            border: 2px solid black;
            /* Solid border around the entire table */
        }

        thead th {
            background-color: #f2f2f2;
            padding: 10px;
            border: 2px solid black;
            /* Solid border for header cells */
        }

        td,
        th {
            border: 2px solid black;
            /* Solid border for all table cells */
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tbody td {
            color: red;
            /* Font color for data cells */
        }

        thead th[colspan="3"] {
            font-size: 12px;
            padding: 15px 5px;
        }

        thead th[colspan="16"] {
            background-color: #d0e0d0;
            font-weight: bold;
            padding: 12px;
            font-size: 16px;
            text-align: center;
        }
    </style>

    <table>
        <thead style="border: 2px solid black;">
            <!-- Main Title Row -->
            <tr style="border: 2px solid black;">
                <th colspan="31" style="text-align: center;">FIRST YEAR: 1ST SEMESTER A.Y. 2023-2024</th>
            </tr>
            <!-- Event Names -->
            <tr style="border: 2px solid black;">
                <th style="text-align: center;border: 2px solid black;" rowspan="4">NAMES</th>
                <th style="text-align: center;border: 2px solid black;" colspan="6">Siglakas</th>
            </tr>
            <!-- Event Dates -->
            <tr style="border: 2px solid black;">
                <th style="text-align: center;border: 2px solid black;" colspan="6">AUGUST 4, 2023</th>
            </tr>
            <!-- Morning and Afternoon -->
            <tr style="border: 2px solid black;">
                <th style="text-align: center;border: 2px solid black;" colspan="3">Morning</th>
                <th style="text-align: center;border: 2px solid black;" colspan="3">Afternoon</th>
            </tr>
            <!-- Log in/out + Total -->
            <tr style="border: 2px solid black;">
                <th style="text-align: center;border: 2px solid black;">LOG IN</th>
                <th style="text-align: center;border: 2px solid black;">LOG OUT</th>
                <th style="text-align: center;border: 2px solid black; color: red;">TOTAL</th>
                <th style="text-align: center;border: 2px solid black;">LOG IN</th>
                <th style="text-align: center;border: 2px solid black;">LOG OUT</th>
                <th style="text-align: center;border: 2px solid black; color: red;">TOTAL</th>

            </tr>
        </thead>
        <tbody style="border: 2px solid black;">
            <tr style="border: 2px solid black;">
                <td style="text-align: center;border: 2px solid black;">ADACHI, Miaka Guillemer</td>
                <td style="text-align: center;border: 2px solid black;">0</td>
                <td style="text-align: center;border: 2px solid black;">0</td>
                <td style="text-align: center;border: 2px solid black; color:red;"><b>0</b></td>
                <td style="text-align: center;border: 2px solid black;">0</td>
                <td style="text-align: center;border: 2px solid black;">0</td>
                <td style="text-align: center;border: 2px solid black; color:red;"><b>0</b></td>

            </tr>
        </tbody>
    </table>
</body>

</html>
