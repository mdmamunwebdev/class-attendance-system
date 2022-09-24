<?php

  include "../dbconfig.php";

  //  Session start

  session_start();
  $session = $_SESSION['user_name'];

  if ($session == true) {

    //main code start

    if (isset($_GET["student_id"])) {



      $roll          = $_GET['roll'];
      $student_name  = $_GET['student_name'];
      $student_id    = $_GET['student_id'];
      $class_id      = $_GET['class_id'];
      $attendance    = $_GET['attendance'];

      $q = "insert into student_attendance(roll, student_name, student_id, class_id, date, attendance) values('$roll','$student_name','$student_id', '$class_id', curdate(), '$attendance')";
      $quary_chack = mysqli_query($con, $q);

      if ($quary_chack) {

        echo " <script>
            
              
              window.location.href='../attendance.php?class_id=$class_id';
            </script>";
      } else {

        echo " <script>
            
              alert('Present Failed !!');
              window.location.href='../attendance.php?class_id=$class_id';
            </script>";
      }
    } else {
      
    }
  } else {

    header('location:../login.php');
  }
