<?php
require('db.inc.php');
$msg="";
if(isset($_POST['username']) && isset($_POST['password'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$res=mysqli_query($con,"select * from employee where username='$username' and password='$password'");
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['username'];
		header('location:index1.php');
		die();
	}else{
		$msg="Please enter correct login details";
	}
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Faculty Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body >
      
      <div class="sufee-login d-flex align-content-center flex-wrap">
      
        
      </div>
      
            <div class="login-content">
               <div id="form"class="login-form mt-150">
                  <form method="post">
                     <div>
                        <h2 class="title">Faculty Leave Management System</h2>
                        <br>
                     </div>
                     <div class="form-group">
                        <label id="label"> &nbsp;Username </label>
                        <input type="username" name="username" class="form-control" placeholder="username" required>
                     </div>
                     <div class="form-group">
                        <label id="label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					 <div class="result_msg"><?php echo $msg?></div>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>

      <style>

      #label{
         color: black;
      }

      .title{
         text-align: center;
         margin-bottom: 0;
         background-color: rgba(0,0,0,.03);
         /* border-bottom: 1px solid rgba(0,0,0,.125); */
         padding: .75rem 1.25rem;
         font-size: 1.875rem;
      }

      #form{
         border: 1px solid black;
      }

      body{
         background-color: #f3f7f7;
         background-image: url("logo1.jpeg");
         background-repeat: no-repeat;
         background-size: 100% 100%;
      }


         </style>
   </body>
</html>