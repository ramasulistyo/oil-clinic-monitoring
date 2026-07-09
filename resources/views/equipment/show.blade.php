<h1>{{ $equipment->equipment_name }}</h1>
<p class="text-gray-500">{{ $equipment->equipment_code }} — {{ $equipment->category }}</p>

<hr>

{{-- RINGKASAN KONDISI --}}
<div style="display:flex; gap:15px; flex-wrap:wrap; margin:15px 0;">

    <div style="border:1px solid #ccc; border-radius:6px; padding:10px 15px;">
        <strong>Status</strong><br>
        {{ $equipment->status }} ({{ $equipment->status_date }})
    </div>

    <div style="border:1px solid #ccc; border-radius:6px; padding:10px 15px;">
        <strong>Availability Rate</strong><br>
        {{ $availabilityRate }}%
    </div>

    <div style="border:1px solid #ccc; border-radius:6px; padding:10px 15px;">
        <strong>Total Jam Operasi</strong><br>
        {{ number_format($totalHours, 2) }} jam
    </div>

    <div style="border:1px solid #ccc; border-radius:6px; padding:10px 15px;">
        <strong>Total Jam Downtime</strong><br>
        {{ number_format($totalDowntimeHours, 2) }} jam
    </div>

    <div style="border:1px solid
        {{ $equipment->maintenance_due_date && $equipment->maintenance_due_date <= now()->addDays(7)->toDateString() ? '#dc2626' : '#ccc' }};
        border-radius:6px; padding:10px 15px;">
        <strong>Maintenance Due</strong><br>
        {{ $equipment->maintenance_due_date ?? '-' }}
    </div>

    <div style="border:1px solid
        {{ $equipment->calibration_due_date && $equipment->calibration_due_date <= now()->addDays(7)->toDateString() ? '#dc2626' : '#ccc' }};
        border-radius:6px; padding:10px 15px;">
        <strong>Calibration Due</strong><br>
        {{ $equipment->calibration_due_date ?? '-' }}
    </div>

</div>

<p>
Brand :
{{ $equipment->brand }}
</p>

<p>
PIC :
{{ $equipment->pic }}
</p>

<hr>

{{-- TIMELINE RIWAYAT KONDISI --}}
<h2>Riwayat Kondisi Equipment</h2>

<div style="border-left:3px solid #ccc; margin-left:10px; padding-left:20px;">
    @forelse($timeline as $t)
        <div style="margin-bottom:15px; position:relative;">
            <div style="position:absolute; left:-27px; top:4px; width:10px; height:10px; border-radius:50%;
                background:{{ $t['color'] == 'red' ? '#dc2626' : ($t['color'] == 'yellow' ? '#ca8a04' : '#2563eb') }};">
            </div>
            <div style="font-size:0.85em; color:#666;">{{ $t['date'] }}</div>
            <div style="font-weight:bold;
                color:{{ $t['color'] == 'red' ? '#dc2626' : ($t['color'] == 'yellow' ? '#ca8a04' : '#2563eb') }};">
                {{ $t['type'] }} — {{ $t['title'] }}
            </div>
            @if($t['desc'])
                <div style="font-size:0.9em;">{{ $t['desc'] }}</div>
            @endif
            @if($t['by'])
                <div style="font-size:0.8em; color:#888;">oleh {{ $t['by'] }}</div>
            @endif
        </div>
    @empty
        <p style="color:#888;">Belum ada riwayat downtime, maintenance, atau kalibrasi.</p>
    @endforelse
</div>

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

<h2>Downtime History</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Date</th>
        <th>Start</th>
        <th>End</th>
        <th>Hours</th>
        <th>Failure Type</th>
        <th>Technician</th>
    </tr>

    @forelse($equipment->downtimeLogs as $log)
    <tr>
        <td>{{ $log->down_date }}</td>
        <td>{{ $log->start_time }}</td>
        <td>{{ $log->end_time }}</td>
        <td>{{ $log->downtime_hours }}</td>
        <td>{{ $log->failure_type }}</td>
        <td>{{ $log->technician }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No downtime history.</td>
    </tr>
    @endforelse
</table>