<!DOCTYPE html>
<?php
include("conn.php");
$qry="select clinic.doctorname,specialization.spname,clinic.clinicname,clinic.starttime,clinic.endtime from clinic inner join specialization on clinic.spid=specialization.spid;";
$res=mysqli_query($con,$qry);

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
                        <h4 class="page-title">Schedule</h4>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>Doctor Name</th>
										<th>Specialization</th>
										<th>Clinic Name</th>
										<th>Available Time</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
									while($row=mysqli_fetch_array($res))
									{?>
									<tr>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php echo $row[0];?></td>
										<td><?php echo $row[1];?></td>
										<td><?php echo $row[2];?></td>
										<td><?php echo $row[3];?>- <?php echo $row[4];?></td>
										<td><span class="custom-badge status-green">Active</span></td>
										
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