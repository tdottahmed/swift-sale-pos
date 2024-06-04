<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>swift-sale</title>
    <style>
        @page {
        sheet-size: A4-L;
        margin-footer: 10px;
        header: page-header;
        footer: page-footer;
    }
    </style>
</head>

<body>
    <div class="container">
        <table style="width: 100%;">
            <tr>
                <td style="width: 20%;text-align: center;"></td>
                <td style="width: 60%;text-align: center;font-size:25px;"><strong>Swift Sale Ecommerce</strong></td>
                <td style="width: 20%;text-align: center;"></td>
            </tr>
            <tr>
                <td style="width: 20%;text-align: center;"></td>
                <td style="width: 60%;text-align: center;">House#39, Road#6, National University, Gazipur</td>
                <td style="width: 20%;text-align: center;"></td>
            </tr>
            <tr>
                <td style="width: 20%;text-align: center;"></td>
                <td style="width: 60%;text-align: center;"><b>Contact:</b> 01611531533, <b>Mail:</b> najmulsarker.cse@gmail.com</td>
                <td style="width: 20%;text-align: center;"></td>
            </tr>
        </table>
        <table style="width: 100%; margin-top:30px;">
            <tr>
                <td style="width: 20%;text-align: center;"></td>
                <td style="width: 60%;text-align: center;"><strong style="text-align: center;font-size:25px;border-bottom:2px solid black;">LEAVE APPLICATION</strong></td>
                <td style="width: 20%;text-align: center;"></td>
            </tr>
        </table>
         <table style="width: 100%;margin-top:15px">
            <tr>
                <td style="width: 50%;text-align: left;"><b>Employee Name : {{ $leave->employee->name ?? null  }}</b></td>
                <td style="width: 30%;text-align: left;font-size:25px;"><strong></strong></td>
                <td style="width: 20%;text-align: left;"><b>Date : </b>{{ $leave->created_at ?? null}}</td>
            </tr>
            <tr>
                <td style="width: 50%;text-align: left;"><b>Office : </b>Swift Sale Ecommerce</td>
                <td style="width: 30%;text-align: left;"></td>
                <td style="width: 20%;text-align: left;"></td>
            </tr>
            <tr>
                <td style="width: 50%;text-align: left;"><b>Designation : </b></td>
                <td style="width: 30%;text-align: left;"></td>
                <td style="width: 20%;text-align: left;"></td>
            </tr>
            <tr>
                <td style="width: 50%;text-align: left;"><b>Department : </b>{{ $leave->department->title }}</td>
                <td style="width: 30%;text-align: left;"></td>
                <td style="width: 20%;text-align: left;"></td>
            </tr>
            <tr>
                <td style="width: 50%;text-align: left;"><b>Supervisor : </b></td>
                <td style="width: 30%;text-align: left;"></td>
                <td style="width: 20%;text-align: left;"></td>
            </tr>
        </table>
        <table style="width: 100%; margin-top:20px;">
            <tr>
                <td style="width: 50%;text-align: left;font-size:20px;"><b>Subject : </b>{{ $leave->leaveType->title ?? null }}</td>
                <td style="width: 30%;text-align: center;"><strong style="text-align: center;font-size:25px;border-bottom:2px solid black;"></strong></td>
                <td style="width: 20%;text-align: center;"></td>
            </tr>
        </table>
        
        <table style="width: 100%; border-collapse: collapse; border: 1px solid black;margin-top:25px;">
            <thead>
                <tr>
                    <th style="width: 6%; border: 1px solid black;">Leave Type</th>
                    <th style="width: 15%; border: 1px solid black;">Description</th>
                    <th style="width: 4%; border: 1px solid black;">From Date</th>
                    <th style="width: 4%; border: 1px solid black;">To Date</th>
                    <th style="width: 3%; border: 1px solid black;">Total Days</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center; border: 1px solid black;">
                        <span>{{ $leave->leaveType->title ?? null }}</span></td>
                    <td style="text-align: center; border: 1px solid black;">
                        <span>{{ $leave->description ?? null }}</span></td>
                    <td style="text-align: center; border: 1px solid black;">
                        <span>{{ $leave->from ?? null }}</span></td>
                    <td style="text-align: center; border: 1px solid black;">
                        <span>{{ $leave->to ?? null }}</span></td>
                    <td style="text-align: center; border: 1px solid black;">
                        <span>{{ $leave->totalDays ?? null }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        window.print()
    </script>
</body>
</html>