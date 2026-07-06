<h1>Calibration Detail</h1>

<hr>

<p>

    <strong>Equipment :</strong>

    {{ $calibrationLog->equipment->equipment_name }}

</p>

<p>

    <strong>Calibration Date :</strong>

    {{ $calibrationLog->calibration_date }}

</p>

<p>

    <strong>Certificate Number :</strong>

    {{ $calibrationLog->certificate_number }}

</p>

<p>

    <strong>Result :</strong>

    {{ $calibrationLog->result }}

</p>

<p>

    <strong>Notes :</strong>

    {{ $calibrationLog->notes }}

</p>

<hr>

<a href="/calibration-log">

    Back

</a>