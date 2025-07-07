<?php
include("conn.php");
session_start();

$qry="select distinct patientname,patientno,patientemail,gender from patient p join appointment a on p.patientid=a.patientid JOIN clinic c ON c.clinicid=a.clinicid where a.clinicid=".$_SESSION["clinicid"];
$res=mysqli_query($con,$qry);

$qry1="select * from clinic where clinicid=".$_SESSION["clinicid"];
$res1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_array($res1);

if(isset($_POST["km"]))
{
	$pmail=$_POST["kmid"];
	header("location:patienthistory.php?pmail=$pmail");
}

if(isset($_POST["logout"]))
{
    header("location:logout.php");
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/profile.css">
	<title>ClinicHub : Patients</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $row1['clinicname'];?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="clinicmain.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="adminappointment.php">Appointments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="clinicpatients.php">Patients</a>
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

  <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>

                    </div>
                    <div class="row doctor-grid">
                    <?php
                    while ($row=mysqli_fetch_array($res))
                    {?>

                
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <?php
                            if($row['gender']=="female"){
                            ?>
                            <div class="doctor-img">
                                <img class="avatar" alt="" src="assets/img/patient-thumb-02.jpg">
                            </div>
                            <?php
                            }?>

                            <?php
                            if($row['gender']=="male"){
                            ?>
                            <div class="doctor-img">
                                <img class="avatar" alt="" src="assets/img/patient-thumb-01.jpg">
                            </div>
                            <?php
                            }?>
                            
                            <h4 class="doctor-name text-ellipsis"><?php echo $row['patientname'];?></h4>
                            <div class="doc-prof"><?php echo $row["patientno"];?></div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row['patientemail'];?>
                            </div>

                            <form method="post">
                            <input type="submit" name="km" value="Know More" class="btn btn-success btn-lg">
                            <input type="hidden" name="kmid" id="apcl" value="<?php echo $row['patientemail'];?>">
                            </form>
                        </div>
                    </div>
                    <?php
                    }?>               
                    </div>
            </div>
  </div>

</body>
</html>