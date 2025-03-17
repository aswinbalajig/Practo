<?php
/* needed fields:
    doctor name
    phone number
    location
    appointment status    
*/ 
require BASE_PATH.'/Utils/DB.php';
$db=new DB(DB_CONFIG_NAME);


function getAppointments($db,$appointment_status)
{ 
    $query="select a.id,d.name,d.phone_number,d.location,a.date,a.appointment_status ".
    "from appointments as a inner join doctors as d on a.doctor_id=d.user_id where a.patient_id=:patient_id and a.appointment_status=:appointment_status";
    $params=[":patient_id"=>$_SESSION["user"],":appointment_status"=>$appointment_status];
    return $db->query_records($query,$params);  
}
$appointment_status=null;
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $appointment_status=$_POST['appointment_status'];
}
else{
    $appointment_status="pending";
}
$appointments=getAppointments($db,$appointment_status);
$alert=null;
require BASE_PATH.'/views/users/my_appointments.php';
