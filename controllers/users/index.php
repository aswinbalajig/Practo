<?php
require BASE_PATH.'/Utils/DB.php';
/*
$doctors = [
    [
        "name" => "Dr. Arjun Kumar",
        "location" => "Chennai, Tamil Nadu",
        "phone_number" => "+91 98765 43210",
        "specialization" => "Cardiologist",
        "description" => "Expert in heart-related treatments with 15+ years of experience.",
    ],
    [
        "name" => "Dr. Meera Sharma",
        "location" => "Bangalore, Karnataka",
        "phone_number" => "+91 87654 32109",
        "specialization" => "Dermatologist",
        "description" => "Specialist in skin care and cosmetic dermatology."
    ],
    [
        "name" => "Dr. Rajesh Patel",
        "location" => "Mumbai, Maharashtra",
        "phone_number" => "+91 76543 21098",
        "specialization" => "Neurologist",
        "description" => "Treats neurological disorders with advanced techniques."
    ],
    [
        "name" => "Dr. Priya Nair",
        "location" => "Kochi, Kerala",
        "phone_number" => "+91 65432 10987",
        "specialization" => "Pediatrician",
        "description" => "Experienced in child healthcare and immunizations."
    ]
];

*/

 


//echo 'reached user index \n';
//echo realpath(BASE_PATH.'/views/users/index.php');
$db=new DB(DB_CONFIG_NAME);
$alert=null;
function checkAppointmentBooked($db,$params)
{   
    $query="select * from appointments where patient_id=:patient_id and doctor_id=:doctor_id";
    $check=$db->query_records($query,$params,true);
    return $check?true:false;
}
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $doctor_id=$_POST['doctor_id'];
    $date=$_POST['appointment_date'];
    $appointment_status="pending";
    $patient_id=$_SESSION['user'];

    $params=[
        ":doctor_id"=>$doctor_id,
        ":date"=>$date,
        ":appointment_status"=>$appointment_status,
        ":patient_id"=>$patient_id
    ];
    if(!checkAppointmentBooked($db,[":doctor_id"=>$doctor_id,":patient_id"=>$patient_id]))
    {
    $query="insert into appointments(doctor_id,date,appointment_status,patient_id) values(:doctor_id,:date,:appointment_status,:patient_id)";
    $db->insert_record($query,$params);
    $alert="Appointment booked successfully";
    $alert_status="success";
    }
    else{
        $alert="Appointment is already booked with this doctor";
        $alert_status="warning";
    }

}


function getUserName($user_id,$db)
{   
    $query="select name from patients where user_id=:user_id";
    $params=[":user_id"=>$user_id];
    $record=$db->query_records($query,$params,true);
    return $record['name'];
}
function fetchDoctorsDetails($db)
{   $db=new DB(DB_CONFIG_NAME);
    $query="select * from doctors";
    $records=$db->query_records($query);
    return $records;
}
$username=getUserName($_SESSION['user'],$db);
$doctors=fetchDoctorsDetails($db);
require BASE_PATH.'/views/users/index.php';