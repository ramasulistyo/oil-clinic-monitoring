<h1>Maintenance Detail</h1>

<hr>

<p>
<b>Equipment :</b>
{{ $maintenanceLog->equipment->equipment_name }}
</p>

<p>
<b>Date :</b>
{{ $maintenanceLog->maintenance_date }}
</p>

<p>
<b>Type :</b>
{{ $maintenanceLog->maintenance_type }}
</p>

<p>
<b>Technician :</b>
{{ $maintenanceLog->technician }}
</p>

<p>
<b>Vendor :</b>
{{ $maintenanceLog->vendor }}
</p>

<p>
<b>Cost :</b>
Rp {{ number_format($maintenanceLog->cost,2) }}
</p>

<p>
<b>Parts Replaced :</b><br>
{{ $maintenanceLog->parts_replaced }}
</p>

<p>
<b>Action Taken :</b><br>
{{ $maintenanceLog->action_taken }}
</p>

<p>
<b>Next Maintenance :</b>
{{ $maintenanceLog->next_maintenance }}
</p>

<p>
<b>Remarks :</b><br>
{{ $maintenanceLog->remarks }}
</p>

<hr>

<a href="/maintenance-log">
    Back
</a>