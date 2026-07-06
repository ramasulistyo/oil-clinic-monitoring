<h1>Edit Downtime Log</h1>

<form action="/downtime-log/{{ $downtimeLog->id }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        Equipment <br>

        <select name="equipment_id">

            @foreach($equipment as $item)

                <option
                    value="{{ $item->id }}"
                    {{ $downtimeLog->equipment_id == $item->id ? 'selected' : '' }}>

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
            name="down_date"
            value="{{ $downtimeLog->down_date }}">

    </p>

    <p>

        Start Time <br>

        <input
            type="time"
            name="start_time"
            value="{{ $downtimeLog->start_time }}">

    </p>

    <p>

        End Time <br>

        <input
            type="time"
            name="end_time"
            value="{{ $downtimeLog->end_time }}">

    </p>

    <p>

        Failure Type <br>

        <select name="failure_type">

            @foreach(['Mechanical','Electrical','Software','Calibration','Power Failure','Others'] as $type)

                <option
                    value="{{ $type }}"
                    {{ $downtimeLog->failure_type == $type ? 'selected' : '' }}>

                    {{ $type }}

                </option>

            @endforeach

        </select>

    </p>

    <p>

        Cause <br>

        <input
            type="text"
            name="cause"
            value="{{ $downtimeLog->cause }}">

    </p>

    <p>

        Action Taken <br>

        <input
            type="text"
            name="action_taken"
            value="{{ $downtimeLog->action_taken }}">

    </p>

    <p>

        Technician <br>

        <input
            type="text"
            name="technician"
            value="{{ $downtimeLog->technician }}">

    </p>

    <p>

        Remarks <br>

        <textarea
            name="remarks"
            rows="4">{{ $downtimeLog->remarks }}</textarea>

    </p>

    <button>

        Update Downtime

    </button>

</form>