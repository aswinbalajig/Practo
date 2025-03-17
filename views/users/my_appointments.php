<?php require __DIR__ . '/../' . 'partials/header.php'; ?>
<?php if ($alert): ?>
    <div class="alert alert-<?= $alert_status ?> alert-dismissible fade show" role="alert">
        <?= $alert ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<div class="container pt-5">
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="row title">
                    <label><span style="font-size:50px; color: rgb(30, 8, 111);">Here are your booked appointments</label>
                    <hr />
                </div>
                <div class="row">
                    <div class="col">
                        <form method="post">
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
                <div class="row pt-5">
                    <div class="col">

                        <?php
                        if ($appointments) {
                            foreach ($appointments as $appointment) {
                                require BASE_PATH . '/views/partials/patients/appointment_card.php';
                            }
                        } else {
                            echo "<h3>There are no $appointment_status appointments</h3>";
                        }

                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>