<?php require BASE_PATH.'/views/partials/header.php'?>

<div class="container" style="margin-top:10%;">
    <div class='row d-flex justify-content-center vh-100'>
        <div class='col-md-5'>
            <label><span style="font-size:20px; color: rgb(30, 8, 111);"><strong>SignUp to find your Patients...</strong></span></label>
            <hr />
            <form method="post">
                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group" style="margin-bottom:15px;">
                    <label for="InputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Phone Number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="Phone Number" placeholder="Enter Your Phone Number" required>
                </div>
                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Location">Location</label>
                    <input type="text" name="location" class="form-control" id="Location" placeholder="Enter Your Location" required>
                </div>
                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Specialization">Specialization</label>
                    <input type="text" name="specialization" class="form-control" id="Specialization" placeholder="Enter Your Specialization" required>
                </div>
                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Availability">Availability</label>
                    <input type="text" name="availability" class="form-control" id="Availability" placeholder="Enter Your Availability Timings" required>
                </div>

                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter something about yourself"></textarea>
                </div>

                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
                </div>
                <div class="form-group" style="margin-bottom:15px;">
                    <label for="Confirm Password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="Confirm Password" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Create Account</button>
            </form>
            <?php if(count($error_msg)>0): ?>
                <?php foreach($error_msg as $msg):?>
                    <span style="color:red;"><?=$msg;?></span>
                <?php endforeach; ?>    
            <?php endif; ?>
        </div>
    </div>
</div>