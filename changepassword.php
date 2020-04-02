<?php
require('top.inc.php');

$user=$_SESSION['USER_ID'];

if(isset($_POST['submit']) ){

    $oldpass=$_POST['old_password'];
    $newpass=$_POST['new_password'];
    $confirmpass=$_POST['confirm_password'];
    

    $query="select password from student where id='$user'";
    $res=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($res)){

        $pass=$row['password'];
        if($pass==$oldpass){

            if($newpass==$confirmpass){

                $sql="update student set password='$confirmpass' where id='$user'";
                $update=mysqli_query($con,$sql);
                if($update){
                    
                    // header('location:login.php');
                    echo "<script> alert('Password Changed Successfully')</script>";
                }

                

                
            }

            else{
                echo "<script> alert('new and confirm password donot match')</script>";
            }

         } else{
                echo "<script> alert('old password donot match')</script>";
            }
        }

    
    }

?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Change Password</strong></div>
                        <div class="card-body card-block">
                           <form method="POST">
						   
								<div class="form-group">
									<label class=" form-control-label">Old Password</label>
									<input type="password" name="old_password" class="form-control" required>
                                </div>
                                <div class="form-group">
									<label class=" form-control-label">New Password</label>
									<input type="password" name="new_password" class="form-control" required>
                                </div>
                                <div class="form-group">
									<label class=" form-control-label">Confirm Password</label>
									<input type="password" name="confirm_password" class="form-control" required >
								</div>
								
								 <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>

