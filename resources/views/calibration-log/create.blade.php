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

        <select name="result">

            <option>PASS</option>

            <option>FAIL</option>

        </select>

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