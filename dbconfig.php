<?php    
    
    //Database Connection

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = 'attendence_management_system';
    $con  = mysqli_connect($host, $user, $pass) or die('database error!!');

    mysqli_select_db($con, $db);
    mysqli_set_charset($con, "utf8");

?>

