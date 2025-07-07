<!DOCTYPE html>
<html lang="en">
<?php
include("conn.php");
$qry="SELECT appointmentid,patientname,age,clinicname,doctorname,appointmentdate,appointmenttime,a.status FROM patient p JOIN appointment a ON p.patientid=a.patientid JOIN clinic c ON c.clinicid=a.clinicid;";
$res=mysqli_query($con,$qry);
?>



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
                        <h4 class="page-title">Appointments</h4>
                    </div>
                    
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th>Appointment ID</th>
										<th>Patient Name</th>
										<th>Age</th>
										<th>Clinic Name</th>
										<th>Doctor Name</th>
										<th>Appointment Date</th>
										<th>Appointment Time</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
									while($row=mysqli_fetch_array($res))
									{?>
									<tr>
										<td><?php echo $row[0];?></td>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php echo $row[1];?></td>
										<td><?php echo $row[2];?></td>
										<td><?php echo $row[3];?></td>
										<td><?php echo $row[4];?></td>
										<td><?php echo $row[5];?></td>
										<td><?php echo $row[6];?></td>
										<?php if($row['status']=="upcoming"){?>
										<td><span class="custom-badge status-blue">Upcoming</span></td>
										<?php 
										}?>
										<?php if($row['status']=="visited"){?>
										<td><span class="custom-badge status-green">Visited</span></td>
										<?php 
										}?>
										<?php if($row['status']=="canceled"){?>
										<td><span class="custom-badge status-red">Canceled</span></td>
										<?php 
										}?>
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