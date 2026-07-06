<h1>Add Operating Log</h1>

<form action="/operating-log" method="POST">

    @csrf

    <p>
        Equipment<br>

        <select name="equipment_id">

            <option value="">-- Select Equipment --</option>

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
        Operating Date<br>

        <input
            type="date"
            name="operating_date"
            value="{{ date('Y-m-d') }}">

    </p>

    <p>
        Start Time<br>

        <input
            type="time"
            name="start_time">

    </p>

    <p>
        End Time<br>

        <input
            type="time"
            name="end_time">

    </p>

    <p>
        Sample Count<br>

        <input
            type="number"
            name="sample_count"
            value="0">

    </p>

    <p>
        PIC<br>

        <input
            type="text"
            name="pic">

    </p>

    <p>
        Remarks<br>

        <textarea
            name="remarks"
            rows="4"
            cols="40"></textarea>

    </p>

    <button type="submit">

        Save Operating Log

    </button>

</form>