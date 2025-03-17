<?php require __DIR__.'/../'.'partials/header.php';?>
<?php if($alert): ?>
<div class="alert alert-<?=$alert_status?> alert-dismissible fade show" role="alert">
  <?=$alert?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="row title">
                            <label><span style="font-size:50px; color: rgb(30, 8, 111);"><strong>Hello <?=$username?>! Find Your
                                        Doctor...</strong></span></label>
                            <hr />
                        </div>
                        <div class="row pt-5">
                            <div class="col">

                                <?php 
                                foreach($doctors as $doctor)
                                {
                                    require __DIR__.'/../'."partials/customer_home_page/doctor_card.php";
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