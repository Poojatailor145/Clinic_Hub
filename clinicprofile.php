<?php
include("conn.php");
$qry="select * from clinic where clinicid=".$_GET["cid"];
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);

$qry1="select * from feedback where clinicid=".$_GET["cid"];
$res1=mysqli_query($con,$qry1);

$qry2="select * from specialization where spid=".$row[10];
$res2=mysqli_query($con,$qry2);
$row2=mysqli_fetch_array($res2);
?>

<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
    .fa{
      color: orange;
    }
  </style>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">ClinicHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="clinicsearch.php">Find a Clinic</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            For Patients
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="glossary.php">Glossary</a></li>
            <li><a class="dropdown-item" href="faq.php">FAQs</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="clinicsearch.php">Book an appointment</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
      </ul>
      </div>
    </div>
  </nav>

  <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Clinic Details</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="clinicsearch.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Go Back</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                    	<?php
										$imgs = array("img/c1.jpg", "img/c2.jpg", "img/c3.jpg", "img/c4.jpg", "img/c5.jpg", "img/c6.jpg","img/c7.jpg","img/c8.jpg","img/c9.jpg","img/c10.jfif");
                                    	?>
                                        <img class="avatar" src="<?php echo $imgs[rand(0,9)];?>" alt="">
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $row['clinicname'];?></h3>
                                                <small class="text-muted"><?php echo $row2[1];?></small><br><br>
                                                <div class="staff-msg"><a class="appbutton" href="registration.php?cid=<?php echo $row['clinicid'];?>"><button type="button" class="btn btn-primary">Make an appointment</button></a></div>
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


                <div class="row tab-pane">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Reviews</h4>
                    </div>

                     <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="review.php?cid=<?php echo $row[0];?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Review</a>
                    </div>
                    
                </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <tr>
                  <th>Patient Name</th>
                  <th>Patient Email</th>
                  <th>Rating</th>
                  <th>Feedback</th>
                </tr>

                <?php
                while($rowf=mysqli_fetch_array($res1))
                {
                  $pqry="select * from patient where patientid=".$rowf['patientid'];
                  $pres=mysqli_query($con,$pqry);
                  $prow=mysqli_fetch_array($pres);
                  ?>
                  <tr>
                  <td><?php echo $prow[1];?></td>
                  <td><?php echo $prow[7];?></td>
                  <td>
                    <?php
                    if($rowf[4]==1)
                    {?>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==2)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==3)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==4)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==5)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>
                  </td>
                  <td><?php echo $rowf[5];?></td>
                  </tr>
                <?php
                }?>
              </table>
            </div>
          </div>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>