<?php
require BASE_PATH.'/Utils/DB.php';
$errors=[];

file_put_contents("logs.txt", "\n reached loggedin controller", FILE_APPEND);
if (isset($_SESSION['user'])) {
    header("Location: /".FOLDER."/users/homepage");
    exit();
}

function accountinfo($email)
{
    //returns email,password,user_id ie accountinfo
    //if exists returns record else returns null
    $db=new DB(DB_CONFIG_NAME);
    $query="select * from users where email=:email";
    $params=[":email"=>$email];
    $records=$db->query_records($query,$params,true);
    if($records)
    {
        return $records;
    }
    return null;


}
if($_SERVER["REQUEST_METHOD"]==="POST")
{   
    $email=$_POST['email'];
    $password=$_POST['password'];
    $account=accountinfo($email);
    if($account!=null)
    {   
       $retrieved_password=$account["password"];
       if(password_verify($password,$retrieved_password))
       {
            $_SESSION['user']=$account["id"];
            $_SESSION['user_type']=$account["user_type"];
            
            header("location:/".FOLDER."/");
            exit();
       }
       $errors[]="email or password is incorrect";
        require BASE_PATH."/views/auth/login.php";
    }
    else
    {   
        $errors[]="email or password is incorrect";
        require BASE_PATH."/views/auth/login.php";    
    }
}
else{
    require BASE_PATH."/views/auth/login.php";    
} 

    