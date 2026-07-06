<h1>Calibration Logs</h1>

<a href="/calibration-log/create">
    Add Calibration Log
</a>

<hr>

<table border="1" cellpadding="10">

    <tr>

        <th>Equipment</th>

        <th>Date</th>

        <th>Certificate</th>

        <th>Result</th>

        <th>Action</th>

    </tr>

    @foreach($logs as $log)

    <tr>

        <td>{{ $log->equipment->equipment_name }}</td>

        <td>{{ $log->calibration_date }}</td>

        <td>{{ $log->certificate_number }}</td>

        <td>{{ $log->result }}</td>

        <td>

            <a href="/calibration-log/{{ $log->id }}">
                View
            </a>

            |

            <a href="/calibration-log/{{ $log->id }}/edit">
                Edit
            </a>

            |

            <form
                action="/calibration-log/{{ $log->id }}"
                method="POST"
                style="display:inline">

                @csrf

                @method('DELETE')

                <button>
                    Delete
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>