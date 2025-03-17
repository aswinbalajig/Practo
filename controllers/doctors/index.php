<?php
/* needed fields:
    patient name
    phone number
    date
    appointment status    
*/ 
require BASE_PATH.'/Utils/DB.php';
$db=new DB(DB_CONFIG_NAME);


function getAppointments($db,$appointment_status)
{ 
    $query="select a.id,p.name,p.phone_number,a.date,a.appointment_status ".
    "from appointments as a inner join patients as p on a.patient_id=p.user_id where a.doctor_id=:doctor_id and a.appointment_status=:appointment_status";
    $params=[":doctor_id"=>$_SESSION["user"],":appointment_status"=>$appointment_status];
    return $db->query_records($query,$params);  
}
function alterStatus($db,$id,$appointment_status)
{
   $query="update appointments ".
   "set appointment_status=:appointment_status ".
   "where id=:id";
   $params=[":id"=>$id,":appointment_status"=>$appointment_status];
   $db->alter_record($query,$params);
}
$appointment_status="pending";
if($_SERVER["REQUEST_METHOD"]==="POST")
{   
    switch($_POST['action'])
    {
        case 'filter':
            $appointment_status=$_POST['appointment_status'];
            break;
        case 'alter_status':
            alterStatus($db,$_POST['id'],$_POST["appointment_status"]);
            break;
        default:
            break;
    }
}
else{
    $appointment_status="pending";
}
$appointments=getAppointments($db,$appointment_status);
$alert=null;

require BASE_PATH.'/views/doctors/index.php';