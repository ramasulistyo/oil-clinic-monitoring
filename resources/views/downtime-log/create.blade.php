<h1>Add Downtime Log</h1>

<form action="/downtime-log" method="POST">

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

        Down Date <br>

        <input
            type="date"
            name="down_date">

    </p>

        <p>

        Repair End Date <br>

        <input
            type="date"
            name="repair_end_date">

    </p>

    <p>

        Start Time <br>

        <input
            type="time"
            name="start_time">

    </p>

    <p>

        End Time <br>

        <input
            type="time"
            name="end_time">

    </p>

    <p>

        Failure Type <br>

        <select name="failure_type">

            <option>Mechanical</option>

            <option>Electrical</option>

            <option>Software</option>

            <option>Calibration</option>

            <option>Power Failure</option>

            <option>Others</option>

        </select>

    </p>

    <p>

        Cause <br>

        <input
            type="text"
            name="cause">

    </p>

    <p>

        Action Taken <br>

        <input
            type="text"
            name="action_taken">

    </p>

    <p>

        Technician <br>

        <input
            type="text"
            name="technician">

    </p>

    <p>

        Remarks <br>

        <textarea
            name="remarks"
            rows="4"></textarea>

    </p>

    <button>

        Save Downtime

    </button>

</form>