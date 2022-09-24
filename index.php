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




<div class="jumbotron text-center ">
  <h1 class="mb-2">Magic Online Attendance System</h1>
  <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut unde optio recusandae placeat? Perspiciatis magni minus amet iure cumque sed, quidem corrupti ad? Iure maiores, quo earum debitis sint deserunt!</p>


  <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add New Class</button>
</div>



<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="shadow-sm">

        <!-- start php code  -->
        <?php
          $sql_table    = "select id, dept_name, course_name, class_time from class";
          $connecttable = mysqli_query($con, $sql_table);
          $rowstable    = mysqli_num_rows($connecttable);

          if ($connecttable) {
            if ($rowstable > 0) {  ?>

              <table class="table table-striped table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Class Time</th>
                    <th scope="col">Number of Student</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while ($class_table_info = mysqli_fetch_assoc($connecttable)) {

                    $class_id    = $class_table_info['id'];
                    $dept_name   = $class_table_info['dept_name'];
                    $course_name = $class_table_info['course_name'];
                   


                    echo "
                                  
                                  <tr>
                                  <th scope='row'>" . $class_table_info['id'] . "</th>
                                  <td>" . $class_table_info['dept_name'] . "</td>
                                  <td>" . $class_table_info['course_name'] . "</td>
                                  <td>" . $class_table_info['class_time'] . "</td>
                                  <td>";
                                       
                                      $sinfo_sql = "select * from student_info where class_id = '$class_id'";
                                      $sinfo_con = mysqli_query($con, $sinfo_sql);
                                      
                                      if( $sinfo_sql ) {
                                        $scount = mysqli_num_rows($sinfo_con);

                                        if( $scount > 0 ) {
                                           echo $scount;
                                        }else{
                                           echo "No";
                                        }

                                      }
                                  
                                  
                    echo"         </td>
                                  <td>
                                      <a href='attendance.php?class_id=$class_id&dept_name=$dept_name&course_name=$course_name'><button class='btn btn-sm btn-success'>View Details</button></a>
                                  </td>";
                  }

                  ?>

                </tbody>
              </table>


          <?php }
            else {
              echo "<div class='text-center text-uppercase px-5 py-3 mt-5 font-weight-bold border border-dark bg-secondary'>no data found ! </div>";
            }
          } else {
          }

        ?>
        <!-- end php code  -->


      </div>
    </div>


  </div>

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

        <form action="./action/classAddAction.php" method="POST">
          <div class="form-group">
            <label for="">Department name</label>
            <input type="text" class="form-control" id="" name="dept_name">
          </div>
          <div class="form-group">
            <label for="">Course Name</label>
            <input type="text" class="form-control" id="" name="course_name">
          </div>
          <div class="form-group">
            <label for="">Class Time</label>
            <input type="text" class="form-control" id="" name="class_time">
          </div>

          <button type="submit" class="btn btn-success" name="submit_class">Submit</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php require 'footer.php'; ?>