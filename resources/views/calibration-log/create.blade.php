<h1>Add Calibration Log</h1>

<form method="POST" action="/calibration-log">

    @csrf

    <p>

        Equipment <br>

        <select name="equipment_id">

         @foreach($equipment as $item)

        <option value="{{ $item->id }}">

            {{ $item->equipment_code }}
            -
            {{ $item->equipment_name }}

        </option>

    @endforeach

</select>

    </p>

    <p>

        Calibration Date <br>

        <input
            type="date"
            name="calibration_date">

    </p>

    <p>

        Certificate Number <br>

        <input
            type="text"
            name="certificate_number">

    </p>

<p>

        Result <br>

        <select name="result" required>

            <option value="PASS">PASS</option>

            <option value="FAIL">FAIL</option>

        </select>

    </p>

    <p>

        Technician <br>

        <input
            type="text"
            name="technician">

    </p>

    <p>

        Vendor <br>

        <input
            type="text"
            name="vendor">

    </p>

    <p>

        Duration of Calibration (hours) <br>

        <input
            type="number"
            step="0.1"
            name="duration_hours">

    </p>

    <p>

        Next Due Date <br>

        <input
            type="date"
            name="next_due_date">

    </p>

    <p>

        Notes <br>

        <textarea
            name="notes"
            rows="5"
            cols="40"></textarea>

    </p>

    <button>

        Save Calibration

    </button>

</form>