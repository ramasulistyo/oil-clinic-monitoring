<h1>Edit Calibration Log</h1>

<form
    method="POST"
    action="/calibration-log/{{ $calibrationLog->id }}">

    @csrf

    @method('PUT')

    <p>

        Equipment <br>

        <select name="equipment_id">

            @foreach($equipment as $item)

                <option
                    value="{{ $item->id }}"
                    {{ $item->id == $calibrationLog->equipment_id ? 'selected' : '' }}>

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
            name="calibration_date"
            value="{{ $calibrationLog->calibration_date }}">

    </p>

    <p>

        Certificate Number <br>

        <input
            type="text"
            name="certificate_number"
            value="{{ $calibrationLog->certificate_number }}">

    </p>

    <p>

        Result <br>

        <select name="result" required>

            <option value="PASS"
                {{ $calibrationLog->result == 'PASS' ? 'selected' : '' }}>

                PASS

            </option>

            <option value="FAIL"
                {{ $calibrationLog->result == 'FAIL' ? 'selected' : '' }}>

                FAIL

            </option>

        </select>

    </p>

    <p>

        Technician <br>

        <input
            type="text"
            name="technician"
            value="{{ $calibrationLog->technician }}">

    </p>

    <p>

        Vendor <br>

        <input
            type="text"
            name="vendor"
            value="{{ $calibrationLog->vendor }}">

    </p>

    <p>

        Duration of Calibration (hours) <br>

        <input
            type="number"
            step="0.1"
            name="duration_hours"
            value="{{ $calibrationLog->duration_hours }}">

    </p>

    <p>

        Next Due Date <br>

        <input
            type="date"
            name="next_due_date"
            value="{{ $calibrationLog->next_due_date }}">

    </p>

    <p>

        Notes <br>

        <textarea
            name="notes"
            rows="5"
            cols="40">{{ $calibrationLog->notes }}</textarea>

    </p>

    <button>

        Update Calibration

    </button>

</form>