
<div class="card shadow mb-5">
    <div class="card-body">
        <h1 class="card-title">
            <i class="fa fa-user-md" style="font-size:50px;"></i>
            <strong><?= htmlspecialchars($doctor["name"]); ?></strong>
        </h1>
        <div class="d-flex flex-row">
            <div>
                <p><i class="bi bi-geo-alt-fill"></i> <?= htmlspecialchars($doctor["location"]); ?></p>
            </div>
            <div class="ps-5 d-flex flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25"
                    fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                </svg>
                <p>: <?= htmlspecialchars($doctor["phone_number"]); ?></p>
            </div>
            <div class="d-flex flex-row ps-3">
                <i class="bi bi-person-fill"></i>
                <p><?= htmlspecialchars($doctor["specialization"]); ?></p>
            </div>
        </div>
        <label for="description"><b>Description:</b></label>
        <p class="card-text" id="description"><?= htmlspecialchars($doctor["description"]); ?></p>

        <div class="d-flex flex-row">
            <div class="pe-2">
                <span style="color: rgb(114, 115, 116); font-style: italic;">Availability:</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                </svg>
                <span style="color: rgb(114, 115, 116); font-style: italic;"><?= htmlspecialchars($doctor["availability"]); ?></span>
            </div>
        </div>
        <form method="post">
            <div class="d-flex flex-row">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="hidden" name="doctor_id" value=<?=$doctor["user_id"]?> />
                            <div class="form-group">
                                <label for="datepicker">Select a Date</label>
                                <input type="date" id="datepicker" class="form-control" required />
                                <input type="hidden" name="appointment_date" id="formattedDateInput" />
                            </div>
                        </div>
                        <div class="col-md-10 mt-auto">
                            <button class="btn btn-primary">Book Appointment</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let datepicker = document.getElementById("datepicker");
        if (datepicker) {
            let today = new Date();
            let formattedDate = today.toISOString().split("T")[0]; // YYYY-MM-DD format
            datepicker.min = formattedDate; // Set min date to today

            datepicker.addEventListener("change", function() {
                let selectedDate = new Date(this.value);
                if (!isNaN(selectedDate.getTime())) {
                    let day = selectedDate.getDate().toString().padStart(2, "0");
                    let month = (selectedDate.getMonth() + 1).toString().padStart(2, "0");
                    let year = selectedDate.getFullYear();
                    formattedDateInput.value = `${day}/${month}/${year}`;
                }
            });
        }
    });
</script>