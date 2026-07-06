<h1>Edit Operating Log</h1>

<form action="/operating-log/{{ $operatingLog->id }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        Equipment<br>

        <select name="equipment_id">

            @foreach($equipment as $item)

                <option
                    value="{{ $item->id }}"
                    {{ $item->id == $operatingLog->equipment_id ? 'selected' : '' }}>

                    {{ $item->equipment_code }} - {{ $item->equipment_name }}

                </option>

            @endforeach

        </select>

    </p>

    <p>
        Operating Date<br>

        <input
            type="date"
            name="operating_date"
            value="{{ $operatingLog->operating_date }}">

    </p>

    <p>
        Start Time<br>

        <input
            type="time"
            name="start_time"
            value="{{ \Carbon\Carbon::parse($operatingLog->start_time)->format('H:i') }}">

    </p>

    <p>
        End Time<br>

        <input
            type="time"
            name="end_time"
            value="{{ \Carbon\Carbon::parse($operatingLog->end_time)->format('H:i') }}">

    </p>

    <p>
        Sample Count<br>

        <input
            type="number"
            name="sample_count"
            value="{{ $operatingLog->sample_count }}">

    </p>

    <p>
        PIC<br>

        <input
            type="text"
            name="pic"
            value="{{ $operatingLog->pic }}">

    </p>

    <p>
        Remarks<br>

        <textarea
            name="remarks"
            rows="4"
            cols="40">{{ $operatingLog->remarks }}</textarea>

    </p>

    <button type="submit">

        Update Operating Log

    </button>

</form>