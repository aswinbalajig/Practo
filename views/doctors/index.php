<?php require BASE_PATH . '/views/partials/header.php' ?>
<div class="container sticky-top bg-white page-title">
    <div class=" row title">
        <label><span style="font-size:50px; color: rgb(30, 8, 111);"><strong>Your
                    Appointments...</strong></span></label>
        <hr />
    </div>
    <div class="row mt-3">
        <div class="col">
            <form method="post">
                <input name="action" value="filter" type="hidden"/>
                <div class="form-group">
                    <label for="appointment_status"><b>Appointment Status</b></label>
                    <select name="appointment_status" id="appointment_status" class="form-select">
                        <option value="pending" <?= ($appointment_status === "pending") ? "selected" : ""; ?>>Pending</option>
                        <option value="confirmed" <?= ($appointment_status === "confirmed") ? "selected" : ""; ?>>Confirmed</option>
                        <option value="cancelled" <?= ($appointment_status === "cancelled") ? "selected" : ""; ?>>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">filter</button>
            </form>
        </div>

    </div>
</div>

<div class="container pt-5">
    <div class="row">
        <div class="col">
            <div class="container">
                 <?php
                 if($appointments)
                 {
                    foreach($appointments as $appointment)
                 {
                    require BASE_PATH . '/views/partials/doctors/patient_appointment.php';
                 }
                 }
                 else{
                    echo "<h2>There are no $appointment_status appointments</h2>";
                 }
                 ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: new Date()
        });
    });
</script>
</body>

</html>