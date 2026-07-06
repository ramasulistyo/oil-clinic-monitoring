<h1>{{ $equipment->equipment_name }}</h1>

<hr>

<p>
Status :
{{ $equipment->status }}
</p>

<p>
Brand :
{{ $equipment->brand }}
</p>

<p>
PIC :
{{ $equipment->pic }}
</p>

<p>
Maintenance Due :
{{ $equipment->maintenance_due_date }}

</p>

<p>
Calibration Due :
{{ $equipment->calibration_due_date }}
</p>

<hr>


<h2>Operating Summary</h2>

<p>

<strong>Total Operating Hours :</strong>

{{ number_format($totalHours,2) }}

Hours

</p>

<p>

<strong>Total Samples :</strong>

{{ $totalSamples }}

</p>

<p>

<strong>Operating Sessions :</strong>

{{ $totalSessions }}

</p>

<p>

<strong>Average Hours / Session :</strong>

{{ number_format($averageHours,2) }}

Hours

</p>

@if($lastOperation)

<p>

<strong>Last Operating Date :</strong>

{{ \Carbon\Carbon::parse($lastOperation->operating_date)->format('d M Y') }}

</p>

<p>

<strong>Last Operator :</strong>

{{ $lastOperation->pic }}

</p>

@endif

<h2>Operating History</h2>

<table border="1" cellpadding="8">

<tr>

    <th>Date</th>
    <th>Start</th>
    <th>End</th>
    <th>Hours</th>
    <th>Samples</th>
    <th>PIC</th>

</tr>

@foreach($equipment->operatingLogs as $log)

<tr>

    <td>{{ \Carbon\Carbon::parse($log->operating_date)->format('d M Y') }}</td>

    <td>{{ \Carbon\Carbon::parse($log->start_time)->format('H:i') }}</td>

    <td>{{ \Carbon\Carbon::parse($log->end_time)->format('H:i') }}</td>

    <td>{{ $log->operating_hours }}</td>

    <td>{{ $log->sample_count }}</td>

    <td>{{ $log->pic }}</td>

</tr>

@endforeach

</table>

<br>


<h2>Maintenance History</h2>

<table border="1">

<tr>
    <th>Date</th>
    <th>Type</th>
    <th>Technician</th>
</tr>

@foreach($equipment->maintenanceLogs as $log)

<tr>
    <td>{{ $log->maintenance_date }}</td>
    <td>{{ $log->maintenance_type }}</td>
    <td>{{ $log->technician }}</td>
</tr>

@endforeach

</table>

<hr>

<h2>Calibration History</h2>

<table border="1">

<tr>
    <th>Date</th>
    <th>Certificate</th>
    <th>Result</th>
</tr>

@foreach($equipment->calibrationLogs as $log)

<tr>
    <td>{{ $log->calibration_date }}</td>
    <td>{{ $log->certificate_number }}</td>
    <td>{{ $log->result }}</td>
</tr>

@endforeach

</table>