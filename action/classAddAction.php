<?php 

 include "../dbconfig.php";

//  Session start

 session_start();
 $session = $_SESSION['user_name'];
 
 if($session == true)
 {

    //main code start

    if( isset($_POST["submit_class"]) ){

      $dept_name    = $_POST['dept_name'];
      $course_name  = $_POST['course_name'];
      $class_time   = $_POST['class_time'];
      
      $q = "insert into class(dept_name, course_name, class_time) values('$dept_name','$course_name','$class_time')";	   
      $quary_chack=mysqli_query($con, $q);

      if($quary_chack){
          
          echo" <script>
            window.location.href='../index.php';
          </script>";
        
      }
      else{
          
            echo" <script>
                
                alert('Data is not inserted in your database  !!');
                window.location.href = '../index.php';
                </script>
                
                ";
          
      }

    }
    else{
      
      
    }

 }
 else{

   header('location:login.php');

 }


 