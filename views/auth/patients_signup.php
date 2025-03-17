<?php require BASE_PATH . '/views/partials/header.php' ?>

<div class="container" style="margin-top:10%;">
    <div class='row d-flex justify-content-center vh-100'>
        <div class='col-md-5'>
        <label><span style="font-size:20px; color: rgb(30, 8, 111);"><strong>SignUp to find your Doctors...</strong></span></label>
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
                    <label for="Age">Age</label>
                    <input type="text" name="age" class="form-control" id="Age" placeholder="Enter Your Age" required>
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
        </div>
    </div>
</div>