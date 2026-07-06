<h1>Add Equipment</h1>

<form action="/equipment" method="POST">
    @csrf
    
    <p>
        Code<br>
        <input type="text" name="equipment_code">
    </p>

    <p>
        Equipment Name<br>
        <input type="text" name="equipment_name">
    </p>

     <p>
        Manufacturer<br>

        <input type="text" name="manufacturer">
     </p>

     <p>

            Category<br>

            <select name="category">

                <option value="">-- Select Category --</option>

                <option value="Viscometer">Viscometer</option>

                <option value="Density Meter">Density Meter</option>

                <option value="Flash Point Tester">Flash Point Tester</option>

                <option value="Karl Fischer Titrator">Karl Fischer Titrator</option>

                <option value="FTIR">FTIR</option>

                <option value="Particle Counter">Particle Counter</option>

                <option value="Other">Other</option>

            </select>

        </p>


    <p>
        Model<br>
        <input type="text" name="model">
    </p>

    <p>
        Serial Number<br>
        <input type="text" name="serial_number">
    </p>

    <p>
        Location<br>
        <input type="text" name="location">
    </p>

    <p>
        PIC<br>
        <input type="text" name="pic">
    </p>

    <p>

         Status<br>

        <select name="status">

        <option value="Ready">Ready</option>
        <option value="In Use">In Use</option>
        <option value="Maintenance">Maintenance</option>
        <option value="Calibration">Calibration</option>
        <option value="Down">Down</option>
        <option value="Retired">Retired</option>

        </select>

        </p>

    <p>

        Status Date<br>

        <input type="date" name="status_date">

        </p>

    <p>
        Maintenance Due Date<br>
        <input type="date" name="maintenance_due_date">
    </p>

    <p>
        Calibration Due Date<br>
        <input type="date" name="calibration_due_date">
    </p>

    <p>

        Notes<br>

        <textarea
        name="notes"
        rows="4"
        cols="35"></textarea>

    </p>

    <p>

        <button type="submit">

        Save Equipment

        </button>

    </p>

</form>