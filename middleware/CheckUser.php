<?php
//session_start();
class CheckUser
{

    public static function checkuser($allowed_user_type)
    {
        switch ($allowed_user_type) {
            case "auth":
                if (!isset($_SESSION['user'])) {
                    header("Location:/".FOLDER."/");
                    exit();
                }
                break;       
            case "guest":
                if (isset($_SESSION['user'])) {
                    header("Location:/".FOLDER."/");
                    exit();
                }
                break;
            case "patient":
                if (isset($_SESSION['user']) && $_SESSION['user_type'] != "patient") {
                    header("Location:/".FOLDER."/");
                    exit();
                }
                break;
            case "doctor":
                if (isset($_SESSION['user']) && $_SESSION['user_type'] != "doctor") {
                    header("Location:/".FOLDER."/");
                    exit();
                }
                break;
            default:
                return null;
        }
    }
}
