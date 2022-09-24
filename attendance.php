<?php
include "dbconfig.php";
require 'header.php';
require 'nav.php';

session_start();
$session = $_SESSION['user_name'];
if ($session == true) {
} else {

  header('location:login.php');
}


?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Attendance</li>
  </ol>
</nav>


<div class="container">

  <div class="card text-center">
    <div class="card-header">
        <?php
        echo "Class No " . $_GET["class_id"];
        ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">Welcome to Your Class</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <button class="btn btn-success my-2 text-capitalize" data-toggle="modal" data-target="#exampleModal">Add new Student</button>
    </div>
    <div class="card-footer text-muted">
      <?php
      echo date("Y-m-d");
      ?>
    </div>
  </div>


  <!-- start php code  -->
  <?php
  $id           = $_GET["class_id"];
  $sql_table    = "select id, roll, student_name from student_info where class_id = $id";
  $connecttable = mysqli_query($con, $sql_table);
  $rowstable    = mysqli_num_rows($connecttable);

  if ($connecttable) {
    if ( $rowstable > 0 ) {  ?>

      <table class="mt-1 table table-hover table-light border rounded-sm table-striped">
        <thead class="">
          <tr>
            <th>Roll No</th>
            <th>Student Name</th>
            <th>Department Name</th>
            <th>Course Name</th>
            <th>Attendence</th>
          </tr>
        </thead>
        <tbody>

          <?php

          while ($class_table_info = mysqli_fetch_assoc($connecttable)) {

            echo "
                                  
                                  <tr>

                                    <th scope='row'>" . $class_table_info['roll'] . "</th>
                                    <td>" . $class_table_info['student_name'] . "</td>
                                    
                                    <td>";

            if (isset($_GET["dept_name"])) {
              echo $_GET["dept_name"];
            } else {
              $id_sub           = $_GET["class_id"];
              $sql_table_sub    = "select  dept_name from class where id = $id_sub";
              $connecttable_sub = mysqli_query($con, $sql_table_sub);
              $class_table_info_sub = mysqli_fetch_assoc($connecttable_sub);
              echo  $class_table_info_sub['dept_name'];
            }
          ?>
            </td>
            <td>
              <?php
              if (isset($_GET["course_name"])) {
                echo $_GET["course_name"];
              } else {
                $id_sub_two           = $_GET["class_id"];
                $sql_table_sub_two    = "select  course_name from class where id = $id_sub_two";
                $connecttable_sub_two = mysqli_query($con, $sql_table_sub_two);
                $class_table_info_sub_two = mysqli_fetch_assoc($connecttable_sub_two);
                echo  $class_table_info_sub_two['course_name'];
              }
              ?>
            </td>
            <td class="text-right">
              <?php
              $class_id_checkbox           = $_GET["class_id"];
              $student_id                  = $class_table_info['id'];
              $presentRadio                = "inlineRadioOptions" . $class_table_info['id'];
              $absentRadio                 = "inlineRadioOptions" . $class_table_info['id'];
              $currentdate                 =  date('Y-m-d');

              $sql_checkbox    = "select class_id, student_id from student_attendance where date = curdate()  AND class_id = $class_id_checkbox AND student_id = $student_id  ";
              $connecttable_checkbox = mysqli_query($con, $sql_checkbox);

              if ($connecttable_checkbox) {

                if (mysqli_num_rows($connecttable_checkbox) > 0) { ?>

                  <button type="button" class="btn btn-info">NA</button>


                <?php  } else { ?>

                  <div class="form-check form-check-inline">

                    <a href="action/presentAction.php?roll=<?php echo $class_table_info['roll']; ?>&student_name=<?php echo $class_table_info['student_name']; ?>&class_id=<?php echo $class_id_checkbox; ?>&student_id=<?php echo $student_id; ?>&attendance=present"><button type="button" class="btn btn-success font-weight-bold">P</button></a>

                  </div>
                  <div class="form-check form-check-inline">

                    <a href="action/absentAction.php?roll=<?php echo $class_table_info['roll']; ?>&student_name=<?php echo $class_table_info['student_name']; ?>&class_id=<?php echo $class_id_checkbox; ?>&student_id=<?php echo $student_id; ?>&attendance=absent"><button type="button" class="btn btn-danger font-weight-bold">A</button></a>

                  </div>

              <?php }
              }

              ?>



            </td>

          <?php echo  "</tr>";
          }

          ?>

        </tbody>
      </table>


  <?php } else {
      echo "<div class='text-center text-uppercase px-5 py-3 mt-5 font-weight-bold border border-dark bg-secondary'>no data found ! </div>";
    }
  } else {
  }

  ?>
  <!-- end php code  -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="studentAddform" action="./action/attendanceAction.php" method="POST">

          <div class="form-group">
            <label for="">Class Id</label>
            <input type="number" class="form-control" id="class_id" name="class_id" readonly value="<?php echo $_GET["class_id"]; ?>">
          </div>
          <div class="form-group">
            <label for="">Roll No</label>
            <input type="number" class="form-control" id="roll" name="roll">
          </div>
          <div class="form-group">
            <label for="">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name">
          </div>
          <div class="form-group">
            <label for="">Session</label>
            <input type="text" class="form-control" id="session" name="session">
          </div>

          <button type="submit" class="btn btn-success" id="submit_student" name="submit_student">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  function present(event, student_id) {
    //  alert(event.target.value);
  }

  function absent(event, student_id) {
    //  alert(student_id);
  }
</script>

<?php require 'footer.php'; ?>