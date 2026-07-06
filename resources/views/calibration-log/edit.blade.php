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

        <select name="result">

            <option
                {{ $calibrationLog->result == 'PASS' ? 'selected' : '' }}>

                PASS

            </option>

            <option
                {{ $calibrationLog->result == 'FAIL' ? 'selected' : '' }}>

                FAIL

            </option>

        </select>

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