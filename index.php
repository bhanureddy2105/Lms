<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:profile.php?id='.$_SESSION['USER_ID']);
	die();
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from department where id='$id'");
}
$res=mysqli_query($con,"select * from department order by id desc");
?>

         
<?php
require('footer.inc.php');
?>