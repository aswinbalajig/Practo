<?php require BASE_PATH.'/views/partials/header.php'?>
<div class="container" style="margin-top:10%;">
    <div class='row d-flex justify-content-center vh-100'>
        <div class='col-md-5'>
            <form method="post">
                <div class="form-group" style="margin-bottom:5px;">
                    <label for="InputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group" style="margin-bottom:5px;">
                    <label for="InputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br/>
                <label class="mt-1">user? signup then:</label>  
                <div class='d-flex justify-content-between w-50'>
                <a href=<?="/".FOLDER."/patients/signup"?> class='flex-1'>for new users</a>
                <a href=<?="/".FOLDER."/doctors/signup"?> class='flex-1'>for new doctors</a>
                </div>
            </form>
            <?php if(count($errors)>0): ?>
                <?php foreach($errors as $msg):?>
                    <span style="color:red;"><?=$msg;?></span>
                <?php endforeach; ?>    
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- <h1 class="text-center">Login Page</h1>
<div class="container">
    <div class="row vh-100 justify-content-center align-item-center">
        <div class="col-md-5 mx-auto">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div> -->
</body>
</html>




