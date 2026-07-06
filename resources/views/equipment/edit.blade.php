<h1>Edit Equipment</h1>

<form action="/equipment/{{ $equipment->id }}" method="POST">

@csrf
@method('PUT')

<p>

Code

<br>

<input
type="text"
name="equipment_code"
value="{{ $equipment->equipment_code }}">

</p>

<p>

Equipment Name

<br>

<input
type="text"
name="equipment_name"
value="{{ $equipment->equipment_name }}">

</p>

<p>

Manufacturer<br>

<input
type="text"
name="manufacturer"
value="{{ $equipment->manufacturer }}">

</p>


<p>

Category<br>

<select name="category">

<option value="">-- Select Category --</option>

<option value="Viscometer"
{{ $equipment->category=='Viscometer'?'selected':'' }}>
Viscometer
</option>

<option value="Density Meter"
{{ $equipment->category=='Density Meter'?'selected':'' }}>
Density Meter
</option>

<option value="Flash Point Tester"
{{ $equipment->category=='Flash Point Tester'?'selected':'' }}>
Flash Point Tester
</option>

<option value="Karl Fischer Titrator"
{{ $equipment->category=='Karl Fischer Titrator'?'selected':'' }}>
Karl Fischer Titrator
</option>

<option value="FTIR"
{{ $equipment->category=='FTIR'?'selected':'' }}>
FTIR
</option>

<option value="Particle Counter"
{{ $equipment->category=='Particle Counter'?'selected':'' }}>
Particle Counter
</option>

<option value="Automatic Titrator"
{{ $equipment->category=='Automatic Titrator'?'selected':'' }}>
Automatic Titrator
</option>

<option value="Balance"
{{ $equipment->category=='Balance'?'selected':'' }}>
Balance
</option>

<option value="Oven"
{{ $equipment->category=='Oven'?'selected':'' }}>
Oven
</option>

<option value="Other"
{{ $equipment->category=='Other'?'selected':'' }}>
Other
</option>

</select>

</p>

<p>

Model

<br>

<input
type="text"
name="model"
value="{{ $equipment->model }}">

</p>

<p>

Serial Number

<br>

<input
type="text"
name="serial_number"
value="{{ $equipment->serial_number }}">

</p>

<p>

Location

<br>

<input
type="text"
name="location"
value="{{ $equipment->location }}">

</p>

<p>

PIC

<br>

<input
type="text"
name="pic"
value="{{ $equipment->pic }}">

</p>

<p>

Status<br>

<select name="status">

<option value="Ready"
{{ $equipment->status=='Ready'?'selected':'' }}>
Ready
</option>

<option value="In Use"
{{ $equipment->status=='In Use'?'selected':'' }}>
In Use
</option>

<option value="Maintenance"
{{ $equipment->status=='Maintenance'?'selected':'' }}>
Maintenance
</option>

<option value="Calibration"
{{ $equipment->status=='Calibration'?'selected':'' }}>
Calibration
</option>

<option value="Down"
{{ $equipment->status=='Down'?'selected':'' }}>
Down
</option>

<option value="Retired"
{{ $equipment->status=='Retired'?'selected':'' }}>
Retired
</option>

</select>

</p>

<p>

Status Date<br>

<input
type="date"
name="status_date"
value="{{ $equipment->status_date }}">

</p>

<p>

Maintenance Due

<br>

<input
type="date"
name="maintenance_due_date"
value="{{ $equipment->maintenance_due_date }}">

</p>

<p>

Calibration Due

<br>

<input
type="date"
name="calibration_due_date"
value="{{ $equipment->calibration_due_date }}">

</p>

<p>

Notes<br>

<textarea
name="notes"
rows="4"
cols="35">{{ $equipment->notes }}</textarea>

</p>

<button>

Update Equipment

</button>

</form>