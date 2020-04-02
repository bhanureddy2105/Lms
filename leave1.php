<?php
require('top.inc1.php');


if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from `faculty_leave` where id='$id'");
}
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$status=mysqli_real_escape_string($con,$_GET['status']);
	mysqli_query($con,"update `faculty_leave` set leave_status='$status' where id='$id'");
}
if($_SESSION['ROLE']==1){ 
	$sql="select `faculty_leave`.*, employee.username,employee.id as eid from `faculty_leave`,employee where `faculty_leave`.faculty_id=employee.id order by `faculty_leave`.id desc";
}else{
	$eid=$_SESSION['USER_ID'];
	$sql="select `faculty_leave`.*, employee.username ,employee.id as eid from `faculty_leave`,employee where `faculty_leave`.faculty_id='$eid' and `faculty_leave`.faculty_id=employee.id order by `faculty_leave`.id desc ";
}
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h2 class="">Leave </h2>
						    <?php if($_SESSION['ROLE']==2){ ?>
						   <h4 class="box_title_link"><a id="add" href="add_leave1.php">Add Leave</a> </h4>
						   <?php } ?>

						   <?php if($_SESSION['ROLE']==1){?>

							<input id="myInput" onkeyup="myFunction()" type="text" placeholder="Search">

						   <?php }?>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table id="myTable" class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <!-- <th width="5%">ID</th> -->
									   <th width="15%">Username</th>
                                       <th width="14%">From</th>
									   <th width="14%">To</th>
									   <th width="15%">Description</th>
									   <th width="15%">Leave Status</th>
									   <th width="10%" ></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <!-- <td><?php echo $row['id']?></td> -->
									   <td><?php echo $row['username']?></td>
                                       <td><?php echo $row['leave_from']?></td>
									   <td><?php echo $row['leave_to']?></td>
									   <td><?php echo $row['leave_description']?></td>
									   <td>
										   <?php
											if($row['leave_status']==1){
												echo "Applied";
											}if($row['leave_status']==2){
												echo "Approved";
											}if($row['leave_status']==3){
												echo "Rejected";
											}
										   ?>

									   </td>
									   <td width="20%">
										   <?php if($_SESSION['ROLE']==1){ ?>
										   <select class="form-control" onchange="update_leave_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
											<option value="">Update Status</option>
											<option value="2">Approved</option>
											<option value="3">Rejected</option>
										   </select>
										   <?php } ?>
									   </td>
									   <td>
									   <?php
									   if($row['leave_status']==1){ ?>
									   <a id="delete"href="leave1.php?id=<?php echo $row['id']?>&type=delete">Delete</a>
									   <?php } ?>
									   
									   
									   </td>
									   
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
         <script>
		 function update_leave_status(id,select_value){
			window.location.href='leave1.php?id='+id+'&type=update&status='+select_value;
		 }

		 var input,input1, filter, table, tr, td, i, txtValue;

		function myFunction() {
  		input = document.getElementById("myInput");
  
  		filter = input.value.toUpperCase();
  		table = document.getElementById("myTable");
  		tr = table.getElementsByTagName("tr");

  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
		 </script>


		<style>

.order-table:after{
	width: 10%;
}

#myInput{
	float: right;
	display: block;
    width: 20%;
    height: 30px;
    padding: 2px;
    font-size: 1rem;
    line-height: 1.5;
    background-color: #E7EEEF;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}

			#add{
    			text-decoration: none;
    			color: #097BBF;
           }

		   #delete{
			text-decoration: none;
    			color: red;
		   }

		</style>
<?php
require('footer.inc.php');
?>