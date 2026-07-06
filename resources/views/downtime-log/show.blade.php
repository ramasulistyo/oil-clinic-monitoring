<h1>Downtime Detail</h1>

<hr>

<p>
    <b>Equipment :</b>
    {{ $downtimeLog->equipment->equipment_name }}
</p>

<p>
    <b>Date :</b>
    {{ $downtimeLog->down_date }}
</p>

<p>
    <b>Start :</b>
    {{ $downtimeLog->start_time }}
</p>

<p>
    <b>End :</b>
    {{ $downtimeLog->end_time }}
</p>

<p>
    <b>Downtime :</b>
    {{ $downtimeLog->downtime_hours }} Hours
</p>

<p>
    <b>Failure :</b>
    {{ $downtimeLog->failure_type }}
</p>

<p>
    <b>Cause :</b>
    {{ $downtimeLog->cause }}
</p>

<p>
    <b>Action Taken :</b>
    {{ $downtimeLog->action_taken }}
</p>

<p>
    <b>Technician :</b>
    {{ $downtimeLog->technician }}
</p>

<p>
    <b>Remarks :</b>
    {{ $downtimeLog->remarks }}
</p>

<hr>

<a href="/downtime-log">
    Back
</a>