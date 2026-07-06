
<h1>Operating Logs</h1>


<a href="/operating-log/create">

    Add Operating Log

</a>

<hr>

<table border="1" cellpadding="10">

<tr>

    <th>Equipment</th>

    <th>Date</th>

    <th>Start</th>

    <th>End</th>

    <th>Hours</th>

    <th>Samples</th>

    <th>PIC</th>

    <th>Action</th>

</tr>

@foreach($logs as $log)

<tr>

    <td>{{ $log->equipment->equipment_name }}</td>

    <td>{{ $log->operating_date }}</td>

    <td>{{ \Carbon\Carbon::parse($log->start_time)->format('H:i') }}</td>

    <td>{{ \Carbon\Carbon::parse($log->end_time)->format('H:i') }}</td>

    <td>{{ $log->operating_hours }}</td>

    <td>{{ $log->sample_count }}</td>

    <td>{{ $log->pic }}</td>

     <td>

        <a href="/operating-log/{{ $log->id }}/edit">

            Edit

        </a>

        |

        <form
            action="/operating-log/{{ $log->id }}"
            method="POST"
            style="display:inline;">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Delete this log?')">

                Delete

            </button>

        </form>

        </td>
    </tr>

@endforeach

</table>