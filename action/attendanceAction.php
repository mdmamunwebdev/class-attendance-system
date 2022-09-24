<?php

  include "../dbconfig.php";

  //  Session start

  session_start();
  $session = $_SESSION['user_name'];

  if ($session == true) {

    //main code start

    if (isset($_POST["submit_student"])) {



      $roll          = $_POST['roll'];
      $student_name  = $_POST['student_name'];
      $session       = $_POST['session'];
      $class_id      = $_POST['class_id'];

      $q = "insert into student_info(roll, student_name, session, class_id) values('$roll','$student_name','$session', '$class_id')";
      $quary_chack = mysqli_query($con, $q);

      if ($quary_chack) {

        echo " <script>
            
              
              window.location.href='../attendance.php?class_id=$class_id';
            </script>";
      } else {

        echo " <script>
            
              alert('Data is not inserted in your database !!');
              window.location.href='../attendance.php?class_id=$class_id';
            </script>";
      }
    } else {
      /*  echo"
              <script>
              
              alert('post sucseccfull!!');
              
              </script>
              
              ";
          */
    }
  } else {

    header('location:../login.php');
  }
