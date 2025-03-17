<?php 
require BASE_PATH.'/Utils/DB.php';


$error_msg=[];


function signup($user_cred,$profile_cred)
{   
    try{
        $db=new DB(DB_CONFIG_NAME);
        
        $connection=$db->get_connection();
        $sign_up_query="insert into users(email,password,user_type) values (:email,:password,:user_type)";
        $profile_query="insert into patients(user_id,name,phone_number,age)"
        . "values(:user_id,:name,:phone_number,:age)";
        
        $connection->beginTransaction();
        
        
        $user_id=$db->insert_record($sign_up_query,$user_cred);
        $profile_cred[':user_id']=$user_id;
        $profile_id=$db->insert_record($profile_query,$profile_cred);

        
        $connection->commit();
        return [true,null];
    
    }
    catch(Exception $e)
    {
        $connection->rollBack();
        return [false,$e->getMessage()];
    }   
}
function user_exists($email)
{   
        $db_conf=require BASE_PATH.'/Utils/DB_conf.php';
        $db=new DB(DB_CONFIG_NAME);
        $query="select * from users where email=:email";
        $params=[":email"=>$email];
        $records=$db->query_records($query,$params,true);
        if($records)
        {
            return true;
        }
        return false;

}
// function profile_exists($name)
// {
//     $db_conf=require BASE_PATH.'/Utils/DB_conf.php';
//         $db=new DB(DB_CONFIG_NAME);
//         $query="select * from patient_s where name=:name";
//         $params=[":email"=>$email];
//         $records=$db->query_records($query,$params);
//         if(count($records)>0)
//         {
//             return true;
//         }
//         return false;

// }

if($_SERVER['REQUEST_METHOD']==='POST') {     
    
    
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $email=$_POST['email'];
    $name=$_POST['name'];
    $phone_number=$_POST['phone_number'];
    $age=$_POST['age'];
    if($password!==$confirm_password)
    {
        $error_msg[]='password and confirm password not matching';
    }
    else{
        $password=password_hash($password,PASSWORD_DEFAULT);
    }

    if(user_exists($email))
    {
        $error_msg[]='user with this email already exists!';
    }

    $user_cred=[":email"=>$email,
               ":password"=>$password,
                ":user_type"=>"patient"];

    $profile_cred=[
    ":user_id"=>null,
    ":name"=>$name,
    ":phone_number"=>$phone_number,
    ":age"=>$age
    ];
    $created = signup($user_cred, $profile_cred);
    if($created[1])
    {
        $error_msg[]=$created[1];
    }

    if (!$error_msg ) {
        #echo "\n signup checking";
        if($created[0]){
            header("location:/" . FOLDER . "/login");
            exit();
        }
    }

    if ($error_msg) {
        require BASE_PATH . "/views/auth/patients_signup.php";
        exit();
    }
}
else
{
    require BASE_PATH."/views/auth/patients_signup.php";
}
