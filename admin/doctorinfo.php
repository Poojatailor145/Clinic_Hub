<?php
include("conn.php");
$qry="select * from clinic where doctoremail='".$_GET["dmail"]."'";
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);

$qry2="select * from specialization where spid=".$row[10];
$res2=mysqli_query($con,$qry2);
$row2=mysqli_fetch_array($res2);
?>

<!DOCTYPE html>
<html>
<head>
    <?php include_once("topscripts.php");?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <title>ClinicHub - Clinic Profile</title>
	
</head>
<body>

  <div class="page-wrapper">

       <?php include_once("header.php");?>
        <?php include_once("nav.php");?>
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Doctor Details</h4>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $row['clinicname'];?></h3>
                                                <small class="text-muted"><?php echo $row2[1];?></small><br><br>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Start Time :</span>
                                                    <span class="text"><?php echo $row['starttime'];?></span>
                                                </li>
                                                <li>
                                                    <span class="title">End Time :</span>
                                                    <span class="text"><?php echo $row['endtime'];?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Contact :</span>
                                                    <span class="text"><?php echo $row['contactno'];?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email :</span>
                                                    <span class="text"><?php echo $row['clinicemail'];?></span>
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
                            <h3 class="card-title">Address</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"><?php echo $row['clinicaddress'];?></a>
                                                <div><?php echo $row['clinicarea'];?></div>
                                                <div><?php echo $row['cliniccity'];?></div>
                                                <span class="time"><?php echo $row['clinicpincode'];?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-7 col-6">
                        <h4 class="page-title">Doctors</h4>
                    	</div>	
                        
                        <div class="row doctor-grid">
                    	<div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><?php echo $row['doctorname'];?></h4>
                            <div class="doc-prof">Gynecologist</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> Contact :<?php echo $row['doctorcontactno'];?><br>
                                <?php echo $row['doctoremail'];?>
                            </div>
                        </div>
                    	</div>
                    	</div>

                    	<div class="col-sm-7 col-6">
                        <h4 class="page-title">Contact Persons</h4>
                    	</div>	
                        
                        <div class="row doctor-grid">
                    	<div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><?php echo $row['contactpersonname'];?></h4>
                            <div class="doc-prof">Gynecologist</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> Contact :<?php echo $row['contactpersonno'];?><br>
                            </div>
                        </div>
                    	</div>
                    	</div>

                    </div>
                </div>
                        </div>
                    </div>
                </div>


               
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <div class="sidebar-overlay" data-reff=""></div>
    <?php include_once("bottomscripts.php");?>
</body>
</html>