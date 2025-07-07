<!DOCTYPE html>
<?php
include("conn.php");
$qry1="select * from patient";
$res=mysqli_query($con,$qry1);
?>

<html lang="en">
<head>
   <?php include_once("topscripts.php");?>
</head>

<body>
    <div class="main-wrapper">
       <?php include_once("header.php");?>
        <?php include_once("nav.php");?>
        <div class="page-wrapper">
           <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>
                    
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										
									</tr>
								</thead>
								<tbody>
									<?php 
									while($row=mysqli_fetch_array($res))
									{?>
									<tr>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php echo $row['patientname'];?></td>
										<td><?php echo $row['age'];?></td>
										<td><?php echo $row['patientaddress'];?></td>
										<td><?php echo $row['patientno'];?></td>
										<td><?php echo $row['patientemail'];?></td>
										
									</tr>
									<?php
									}?>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <?php include_once("bottomscripts.php");?>

</body>



</html>