<h1>Edit Maintenance Log</h1>

<form action="/maintenance-log/{{ $maintenanceLog->id }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        Equipment <br>

        <select name="equipment_id">

            @foreach($equipment as $item)

                <option
                    value="{{ $item->id }}"
                    {{ $maintenanceLog->equipment_id == $item->id ? 'selected' : '' }}>

                    {{ $item->equipment_code }} - {{ $item->equipment_name }}

                </option>

            @endforeach

        </select>

    </p>

    <p>
        Maintenance Date <br>

        <input
            type="date"
            name="maintenance_date"
            value="{{ $maintenanceLog->maintenance_date }}">

    </p>

    <p>
        Maintenance Type <br>

        <select name="maintenance_type">

            <option value="Preventive"
                {{ $maintenanceLog->maintenance_type == 'Preventive' ? 'selected' : '' }}>
                Preventive
            </option>

            <option value="Corrective"
                {{ $maintenanceLog->maintenance_type == 'Corrective' ? 'selected' : '' }}>
                Corrective
            </option>

            <option value="Predictive"
                {{ $maintenanceLog->maintenance_type == 'Predictive' ? 'selected' : '' }}>
                Predictive
            </option>

        </select>

    </p>

    <p>
        Technician <br>

        <input
            type="text"
            name="technician"
            value="{{ $maintenanceLog->technician }}">

    </p>

    <p>
        Vendor <br>

        <input
            type="text"
            name="vendor"
            value="{{ $maintenanceLog->vendor }}">

    </p>

    <p>
        Cost <br>

        <input
            type="number"
            step="0.01"
            name="cost"
            value="{{ $maintenanceLog->cost }}">

    </p>

    <p>
        Parts Replaced <br>

        <textarea name="parts_replaced">{{ $maintenanceLog->parts_replaced }}</textarea>

    </p>

    <p>
        Action Taken <br>

        <textarea name="action_taken">{{ $maintenanceLog->action_taken }}</textarea>

    </p>

    <p>
        Next Maintenance <br>

        <input
            type="date"
            name="next_maintenance"
            value="{{ $maintenanceLog->next_maintenance }}">

    </p>

    <p>
        Remarks <br>

        <textarea name="remarks">{{ $maintenanceLog->remarks }}</textarea>

    </p>

    <button type="submit">

        Update Maintenance

    </button>

</form>