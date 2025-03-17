<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-PDUiPu3vDllMfrUHnurV430Qg8chPZTNhY8RUpq89lq22R3PzypXQifBpcpE1eoB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/js/coreui.bundle.min.js" integrity="sha384-8QmUFX1sl4cMveCP2+H1tyZlShMi1LeZCJJxTZeXDxOwQexlDdRLQ3O9L78gwBbe" crossorigin="anonymous"></script>
    <style>
        .doctor-list li {
            height: 250px;
            padding-bottom: 5px;
        }

        .title {
            height: 100px;
        }

        .page-header {
            background: linear-gradient(to left, rgb(255, 255, 255), rgb(140, 140, 246));
            z-index: 20;
        }

        .page-title {
            z-index: 10;
        }

        .status {
            height: fit-content;
        }
    </style>

</head>

<body>
    <header class="d-flex flex-wrap sticky-top justify-content-center py-3 mb-4 border-bottom page-header nav-bar">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4"><strong>Practo</strong></span>
        </a>

        <ul class="nav nav-pills">
            <?php
            require 'conf.php';
            if (isset($_SESSION['user'])) {
                if($_SESSION['user_type']==='patient'){
                    echo "<li class='nav-item'><a href=/".FOLDER."/patients/appointments class='nav-link'>Appointments</a></li>";
                }
                echo "<li class='nav-item'><a href=/" . FOLDER . "/ class='nav-link' aria-current='page'>Home</a></li>";
                echo "<li class='nav-item'><a href=/" . FOLDER . "/logout class='nav-link'>logout</a></li>";
            } else {
                echo "<li class='nav-item'><a href=/" . FOLDER . "/login class='nav-link'>login/signup</a></li>";
            }
            ?>

        </ul>
    </header>