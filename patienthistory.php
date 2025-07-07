<!DOCTYPE html>
<?php
include("conn.php");
session_start();

$qry1="select * from clinic where clinicid=".$_SESSION["clinicid"];
$res1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_array($res1);

$qry="select * from patient where patientemail='".$_GET["pmail"]."'";
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);

$qry2="select concern,appointmentdate,appointmenttime from appointment a join patient p on p.patientid=a.patientid JOIN clinic c ON c.clinicid=a.clinicid where a.clinicid=".$_SESSION["clinicid"]." and patientemail='".$_GET["pmail"]."'";
$res2=mysqli_query($con,$qry2);

if(isset($_POST["logout"]))
{
    header("location:logout.php");
}

?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/profile.css">
	<title>ClinicHub : Patient History</title>
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
          <a class="nav-link" href="review.php">Reviews</a>
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
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Patient Details</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="clinicpatients.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Go Back</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">

                                <div class="profile-img-wrap">
                                    <?php 
                                    if($row['gender']=="male"){
                                    ?>
                                    <div class="profile-img">
                                        <img class="avatar" src="assets/img/patient-thumb-01.jpg" alt="">
                                    </div>
                                    <?php }else{?>
                                    <div class="profile-img">
                                        <img class="avatar" src="assets/img/patient-thumb-02.jpg" alt="">
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5" >
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $row['patientname'];?></h3>
                                                <small class="text-muted"><?php echo $row['patientno'];?></small><br><br>
                                                <small class="text-muted"><?php echo $row['patientaddress'];?></small><br>
                                                <small class="text-muted"><?php echo $row['patientarea'];?></small><br>
                                                <small class="text-muted"><?php echo $row['patientcity'];?></small><br>
                                                <small class="text-muted"><?php echo $row['patientpincode'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Email :</span>
                                                    <span class="text"><?php echo $row['patientemail'];?></span>
                                                </li>
                                                <li>
                                                    <span class="title">DOB :</span>
                                                    <span class="text"><?php echo $row['dob'];?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Age :</span>
                                                    <span class="text"><?php echo $row['age'];?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender :</span>
                                                    <span class="text"><?php echo $row['gender'];?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="profile-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Appointments</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <?php 
                                        while($row2=mysqli_fetch_array($res2))
                                        {
                                        ?>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <div class="name"><b><?php echo $row2['concern'];?></b></div>
                                                <div>Appointment Date : <?php echo $row2['appointmentdate'];?></div>
                                                <div>Appointment Time : <?php echo $row2['appointmenttime'];?></div>
                                            </div>
                                        </div>
                                        <br>
                                    	<?php }?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab2">
                            Tab content 2
                        </div>
                        <div class="tab-pane" id="bottom-tab3">
                            Tab content 3
                        </div>
                    </div>
                </div>
            </div>
        </div>



</body>
</html>