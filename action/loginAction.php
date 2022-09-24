<?php
   include "../dbconfig.php"; 
   session_start();


   if(isset($_POST['log'])){
	   
	 $name = $_POST['username'];  
	 $pass = $_POST['password'];
	 
	    $quary="select * from user where username = '$name'";
		$quary_check = mysqli_query($con, $quary);
		
	 
     	if($quary_check) {
			
			
		    if(mysqli_num_rows($quary_check) > 0){
				
				
				
				$qua="select * from user where password = '$pass'";
				$qua_check=mysqli_query($con, $qua);
		
		
				if( $qua_check ){
					
					
					if( mysqli_num_rows($qua_check) > 0 ){
						
						$_SESSION['user_name'] = $name;
						echo"

							<script>
								window.location.href='../index.php';
							</script>

						"; 
						
					}
					else{
						
						echo"

							<script>
								alert('PLEASE ENTER CORRECT PASSWORD !!');
								window.location.href='../login.php';
							</script>
						
						";
											
					}
					
				}
				else{
					//row check second
					
						echo"

							<script>
								alert('CONNECTON PROBLEMB  PLEASE TRY AGAIN !!');
								window.location.href='../login.php';
							</script>
		
						";
				}
			}
			else{
				//row check first
				
						echo"
					 <script>
					 alert('PLEASE ENTER CORRECT USERNAME !!');
					  window.location.href='../login.php';
					 </script>
					 
					 ";
			}
		}
	   else{
		   //quary_check
		   
		  
						echo"
					 <script>
					 alert('CONNECTON PROBLEMB PLEASE TRY AGAIN  !!');
					 window.location.href='../login.php';
					 </script>
					 
					 ";

		   
		   
	   }
	   
	   
   }
   else{//login check 
   
   // echo"<script>alert('thanks');</script>";
   
   }
