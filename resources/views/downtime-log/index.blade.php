<h1>Downtime Logs</h1>

<a href="/downtime-log/create">
    Add Downtime Log
</a>

<hr>

<table border="1" cellpadding="10">

<tr>

    <th>Equipment</th>

    <th>Date</th>

    <th>Start</th>

    <th>End</th>

    <th>Hours</th>

    <th>Failure</th>

    <th>Technician</th>
    
    <th>Actions</th>

</tr>

@foreach($logs as $log)

<tr>

    <td>{{ $log->equipment->equipment_name }}</td>

    <td>{{ $log->down_date }}</td>

    <td>{{ $log->start_time }}</td>

    <td>{{ $log->end_time }}</td>

    <td>{{ $log->downtime_hours }}</td>

    <td>{{ $log->failure_type }}</td>

    <td>{{ $log->technician }}</td>

    <td>

    
    
    <a href="/downtime-log/{{ $log->id }}">
        View
    </a>

    |

    <a href="/downtime-log/{{ $log->id }}/edit">
        Edit
    </a>

    |

    <form
        action="/downtime-log/{{ $log->id }}"
        method="POST"
        style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            onclick="return confirm('Delete this downtime?')">
            Delete
        </button>

    </form>

    </td>
</tr>

@endforeach

</table>