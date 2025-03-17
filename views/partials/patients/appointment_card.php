<div class="row pt-5">
    <div class="col">

        <div class="card shadow" style="background:
        <?php if($appointment["appointment_status"]==="pending"):?>
            LightYellow
        <?php elseif($appointment["appointment_status"]==="success"): ?>
            LightGreen
        <?php else:?>
            LightCoral
        <?php endif;?>
        ;">
            <div class="card-body">
                <h1 class="card-title"><i class="fa fa-user-md" style="font-size:50px;"></i>
                    <strong><?=$appointment['name']?></strong>
                </h1>
                <div class="d-flex flex-row">
                    <div>
                        <p><i class="bi bi-geo-alt-fill"></i><?=$appointment['location']?></p>
                    </div>
                    <div class="ps-5 d-flex flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25"
                            fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <p> : <?=$appointment['phone_number']?></p>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 d-flex flex-row">
                                <label for="date">Appointment Date:</label>
                                <p class="ms-2" id="date"><?=$appointment['date']?></p>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
</div>