<?php
$folder='php project';
$router->get("/patients","controllers\users\index.php","patient");
$router->post("/patients","controllers\users\index.php","patient");
$router->get("/doctors","controllers\doctors\index.php","doctor");
$router->post("/doctors","controllers\doctors\index.php","doctor");
$router->get('/login',"controllers\auth\login.php","guest");
$router->post('/login',"controllers\auth\login.php","guest");
$router->get('/patients/signup',"controllers\auth\patients_signup.php","guest");
$router->get('/doctors/signup',"controllers\auth\doctors_signup.php","guest");
$router->post('/patients/signup',"controllers\auth\patients_signup.php","guest");
$router->post('/doctors/signup',"controllers\auth\doctors_signup.php","guest");
$router->get('/logout',"controllers\auth\logout.php","auth");
$router->get('/patients/appointments',"controllers\users\appointments.php","patient");
$router->post('/patients/appointments',"controllers\users\appointments.php","patient");


