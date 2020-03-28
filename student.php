<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_student.php?id='.$_SESSION['USER_ID']);
	die();
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from student where id='$id'");
}
$res=mysqli_query($con,"select * from student where role=2 order by id ");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Student Master </h4>
						   <h4 class="box_title_link"><a id="add" href="add_student.php">Add student</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="30%">Enrollement no.</th>
									            <th width="20%">Email</th>
									            <th width="10%">Mobile</th>
                                       <th width="20%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									            <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['username']?></td>
									            <td><?php echo $row['email']?></td>
									            <td><?php echo $row['mobile']?></td>
									            <td><a id="add1" href="add_student.php?id=<?php echo $row['id']?>">Edit</a> <a id="add2" href="student.php?id=<?php echo $row['id']?>&type=delete">Delete</a></td>
                                    </tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
        <style>
			#add{
    			text-decoration: none;
    			color: #097BBF;
           }
           
           #add1{
              text-decoration: none;
              color: #228B22;
           }

           #add2{
              text-decoration: none;
              color: red;
           }
		</style>
         
<?php
require('footer.inc.php');
?>