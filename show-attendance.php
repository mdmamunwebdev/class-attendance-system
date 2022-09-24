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
        <li class="breadcrumb-item active" aria-current="page">Previous Attendance</li>
    </ol>
</nav>


<div class="container">

    <div class="row">
        <div class="col-md-12">
             
            <h2 class="text-center mt-4 mb-4">Previous Attendance</h2>

            <form action="" method="get" class="mb-5">

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Class select</label>
                    <select class="form-control" name="filter_class" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" name="filter_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">To</label>
                    <input type="date" name="to_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div> -->

                <button type="submit" name="filter" class="btn btn-primary">Search</button>
            </form>

            <div class="row">
                <div class="col-sm-12">

                    <div class="mb-4">
                            
                            <?php 
                            
                                if(isset($_GET['filter'])) {

                                    $filter_class = $_GET['filter_class'];
                                    $filter_date  = $_GET['filter_date'];
                                
                                    $filter_sql  = "select * from student_attendance where date = '$filter_date' AND class_id = '$filter_class' ";
                                    $filter_con  = mysqli_query($con, $filter_sql);

                                    if( $filter_con ) {
                                        if( mysqli_num_rows($filter_con) > 0 ) { ?>
                                            
                                            <div class="card text-center">

                                                <div class="card-header">
                                                    <?php echo "Class No ".  $filter_class; ?>
                                                </div>
                                                <div class="card-body">

                                                    <h5 class="card-title"><?php echo  $filter_date; ?></h5>
                                                   
                                                   
                                                </div>
                                                <div class="card-footer text-muted">
                                                    

                                                        <table class="table table-hover table-striped">
                                                            <thead class=" ">
                                                                <tr>
                                                                    <th scope="col">Roll</th>
                                                                    <th scope="col">Department Name</th>
                                                                    <th scope="col">Attendance</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php while( $filter_result = mysqli_fetch_assoc( $filter_con ) ) {

                                                                echo"   <tr>
                                                                            <th scope='row'>".$filter_result['roll']."</th>
                                                                            <td>".$filter_result['student_name']."</td>
                                                                            <td>" ?>

                                                                                 <?php 
                                                                                     
                                                                                     if( $filter_result['attendance'] == 'present') {

                                                                                        echo "<button class='btn btn-success text-uppercase text-weight-bold'>p</button>";
                                                                                     }else{
                                                                                        echo "<button class='btn btn-danger text-uppercase text-weight-bold'>a</button>";
                                                                                     }
                                                                                 
                                                                                 
                                                                                 ?>


                                                                            </td>
                                                                        </tr>
                                    
                                                      <?php      } ?>

                                                            </tbody>
                                                        </table>

                                                   <?php    }
                                                            else{

                                                                echo "<div class='text-center text-uppercase px-5 py-3 mt-5 font-weight-bold border border-dark bg-secondary'>no data found ! </div>";
                                                            }
                                                        }
                                                    }
                                                
                                                
                                                    ?>   

                                                </div>
            
                                            </div>    
                                                                                                                                                              
                    </div>
                        
                    <br/>

                </div> 
            </div>

        </div>
    </div>   
</div>

<?php require 'footer.php'; ?>