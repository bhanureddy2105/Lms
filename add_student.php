<?php
require('top.inc.php');
$username='';
$email='';
$mobile='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if($_SESSION['ROLE']==2 && $_SESSION['USER_ID']!=$id){
		die('Access denied');
	}
	$res=mysqli_query($con,"select * from student where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$username=$row['username'];
	$email=$row['email'];
	$mobile=$row['mobile'];
}
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	if($id>0){
		$sql="update student set username='$username',email='$email',mobile='$mobile',password='$password' where id='$id'";
	}else{
		$sql="insert into student(username,email,mobile,password,role) values('$username','$email','$mobile','$password','2')";
	}
	mysqli_query($con,$sql);
	header('location:student.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>ADD STUDENT</strong></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
									<label class=" form-control-label">Enrollment no.</label>
									<input type="text" value="<?php echo $username?>" name="username" placeholder="Enter username/Enrollment no." class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Email</label>
									<input type="email" value="<?php echo $email?>" name="email" placeholder="Enter student email" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Mobile</label>
									<input type="text" value="<?php echo $mobile?>" name="mobile" placeholder="Enter student mobile" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Password</label>
									<input type="password"  name="password" placeholder="Enter student password" class="form-control" required>
								</div>
								
								
							   <?php if($_SESSION['ROLE']==1){?>
							   <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <?php } ?>
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