<h1>Add Maintenance Log</h1>

<hr>

<form action="/maintenance-log" method="POST">

    @csrf

    <p>

        Equipment

        <br>

        <select name="equipment_id">

            @foreach($equipment as $item)

                <option value="{{ $item->id }}">

                    {{ $item->equipment_name }}

                </option>

            @endforeach

        </select>

    </p>

    <p>

        Maintenance Date

        <br>

        <input
            type="date"
            name="maintenance_date">

    </p>

    <p>

        Maintenance Type

        <br>

        <select name="maintenance_type" required>

            <option value="Preventive">Preventive</option>

            <option value="Corrective">Corrective</option>

            <option value="Predictive">Predictive</option>

            <option value="Emergency">Emergency</option>

        </select>
    </p>

    <p>

        Technician

        <br>

        <input
            type="text"
            name="technician">

    </p>

    <p>

        Vendor

        <br>

        <input
            type="text"
            name="vendor">

    </p>

    <p>

        Cost

        <br>

        <input
            type="number"
            step="0.01"
            name="cost">

    </p>

    <p>

        Parts Replaced

        <br>

        <textarea
            name="parts_replaced"></textarea>

    </p>

    <p>

        Action Taken

        <br>

        <textarea
            name="action_taken"></textarea>

    </p>

    <p>

        Next Maintenance

        <br>

        <input
            type="date"
            name="next_maintenance">

    </p>

    <p>

        Remarks

        <br>

        <textarea
            name="remarks"></textarea>

    </p>

    <button>

        Save

    </button>

</form>