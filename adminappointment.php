
<?php
include("conn.php");
session_start();

$qry="SELECT appointmentid,patientname,age,patientemail,doctorname,appointmentdate,appointmenttime FROM patient p JOIN appointment a ON p.patientid=a.patientid JOIN clinic c ON c.clinicid=a.clinicid where a.status='upcoming' and c.clinicid=".$_SESSION["clinicid"];
$res=mysqli_query($con,$qry);
$rowf=mysqli_fetch_array($res);
$tomail=$rowf[3];

$qry3="SELECT appointmentid,patientname,age,patientemail,doctorname,appointmentdate,appointmenttime FROM patient p JOIN appointment a ON p.patientid=a.patientid JOIN clinic c ON c.clinicid=a.clinicid where a.status='visited' and c.clinicid=".$_SESSION["clinicid"];
$res3=mysqli_query($con,$qry3);

$qry4="SELECT appointmentid,patientname,age,patientemail,doctorname,appointmentdate,appointmenttime FROM patient p JOIN appointment a ON p.patientid=a.patientid JOIN clinic c ON c.clinicid=a.clinicid where a.status='canceled' and c.clinicid=".$_SESSION["clinicid"];
$res4=mysqli_query($con,$qry4);

$qry2="SELECT * from clinic where clinicid=".$_SESSION["clinicid"];
$res2=mysqli_query($con,$qry2);
$row2=mysqli_fetch_array($res2);

if(isset($_POST["logout"]))
{
    header("location:logout.php");
}


?>



<!DOCTYPE html>
<html lang="en">



<head>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <title>ClinicHub - Appointments</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $row2['clinicname'];?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="clinicmain.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="adminappointment.php">Appointments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="clinicpatients.php">Patients</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="clinicreview.php">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editadmin.php">Admin</a>
        </li>
      </ul>
      <form class="d-flex" method="post">
        <button class="btn btn-outline-danger" name="logout">Log Out</button>
      </form>
      </div>
    </div>
  </nav>

    <div class="main-wrapper">
       
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Upcoming Appointments</h4>
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
										<th>Patient Email</th>
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
										<td><a href="appappointment.php?apapp=<?php echo $row['appointmentid'];?>&cid=<?php echo $row2[0];?>"><button class="btn btn-outline-success" name="approve">Approve</button></a>  <a href="delappointment.php?delapp=<?php echo $row['appointmentid'];?>&cid=<?php echo $row2[0];?>"><button class="btn btn-outline-danger">Cancel</button></a></td>
									</tr>
									<?php
									}?>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>


            <div class="content">
            <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Visited Appointments</h4>
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
                    <th>Patient Email</th>
                    <th>Doctor Name</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while($row3=mysqli_fetch_array($res3))
                  {?>
                  <tr>
                    <td><?php echo $row3[0];?></td>
                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php echo $row3[1];?></td>
                    <td><?php echo $row3[2];?></td>
                    <td><?php echo $row3[3];?></td>
                    <td><?php echo $row3[4];?></td>
                    <td><?php echo $row3[5];?></td>
                    <td><?php echo $row3[6];?></td>
                  </tr>
                  <?php
                  }?>
                </tbody>
              </table>
            </div>
          </div>
                </div>
                </div>



          <div class="content">
            <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Canceled Appointments</h4>
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
                    <th>Patient Email</th>
                    <th>Doctor Name</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while($row4=mysqli_fetch_array($res4))
                  {?>
                  <tr>
                    <td><?php echo $row4[0];?></td>
                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php echo $row4[1];?></td>
                    <td><?php echo $row4[2];?></td>
                    <td><?php echo $row4[3];?></td>
                    <td><?php echo $row4[4];?></td>
                    <td><?php echo $row4[5];?></td>
                    <td><?php echo $row4[6];?></td>
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

</body>



</html>