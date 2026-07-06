<h1>Maintenance Logs</h1>

<a href="/maintenance-log/create">

    Add Maintenance Log

</a>

<hr>

<table border="1" cellpadding="10">

<tr>

    <th>Equipment</th>

    <th>Date</th>

    <th>Type</th>

    <th>Technician</th>

    <th>Vendor</th>

    <th>Cost</th>

    <th>Next Maintenance</th>

    <th>Action</th>

</tr>

@foreach($logs as $log)

<tr>

    <td>{{ $log->equipment->equipment_name }}</td>

    <td>{{ $log->maintenance_date }}</td>

    <td>{{ $log->maintenance_type }}</td>

    <td>{{ $log->technician }}</td>

    <td>{{ $log->vendor }}</td>

    <td>{{ number_format($log->cost, 2) }}</td>

    <td>{{ $log->next_maintenance }}</td>

    <td>

        <a href="/maintenance-log/{{ $log->id }}">
            View
        </a>

        |

        <a href="/maintenance-log/{{ $log->id }}/edit">
            Edit
        </a>

        |

        <form
            action="/maintenance-log/{{ $log->id }}"
            method="POST"
            style="display:inline;">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Delete this maintenance log?')">

                Delete

            </button>

        </form>

    </td>

</tr>

@endforeach

</table>