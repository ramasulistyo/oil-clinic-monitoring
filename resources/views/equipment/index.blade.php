<h1>Equipment</h1>

<a href="/equipment/create">
    Add Equipment
</a>

<hr>

<table border="1" cellpadding="10">

    <tr>    
        <th>Code</th>
        <th>Equipment</th>
        <th>Manufacturer</th>
        <th>Category</th>
        <th>Status</th>
        <th>Status Date</th>
        <th>PIC</th>
        <th>Maintenance Due</th>
        <th>Calibration Due</th>
        <th>Action</th>
    </tr>

    @foreach($equipment as $item)

    <tr>

        <td>{{ $item->equipment_code }}</td>

        <td>
            <a href="/equipment/{{ $item->id }}">
                {{ $item->equipment_name }}
            </a>
        </td>

        <td>{{ $item->manufacturer }}</td>

        <td>{{ $item->category }}</td>

        <td>{{ $item->status }}</td>

        <td>{{ $item->status_date }}</td>

        <td>{{ $item->pic }}</td>

        <td>{{ $item->maintenance_due_date }}</td>

        <td>{{ $item->calibration_due_date }}</td>

        <td>

            <a href="/equipment/{{ $item->id }}">
                View
            </a>

            |

            <a href="/equipment/{{ $item->id }}/edit">
                Edit
            </a>

            |

            <form
                action="/equipment/{{ $item->id }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    onclick="return confirm('Delete this equipment?')">
                    Delete
                </button>

            </form>

        </td>
    </tr>
    @endforeach
</table>