<?php
include("conn.php");
session_start();

$qry1="select * from clinic where clinicid=".$_SESSION["clinicid"];
$res1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_array($res1);

$qry="select * from feedback where clinicid=".$_SESSION["clinicid"];
$res=mysqli_query($con,$qry);

if(isset($_POST["logout"]))
{
    header("location:logout.php");
}
?>

<!DOCTYPE html> 
<html>
<head>
  <style type="text/css">
    .fa{
      color: orange;
    }
  </style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/review.css">
    <link rel="stylesheet" type="text/css" href="review.js">
	<title>ClinicHub : Reviews</title>
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
          <a class="nav-link " href="clinicpatients.php">Patients</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link active" href="clinicreview.php">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editadmin.php">Admin</a>
        </li>
      </ul>
      <form class="d-flex" method="post">
        <button name="logout" class="btn btn-outline-danger">Log Out</button>
      </form>
      </div>
    </div>
  </nav>

	<div class="page-wrapper">
           <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Reviews</h4>
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
                  <th>Date</th>
                </tr>

                <?php
                while($rowf=mysqli_fetch_array($res))
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
                  <td><?php echo $rowf[6];?></td>
                  </tr>
                <?php
                }?>
              </table>
            </div>
          </div>
                </div>
            </div>
        </div>

</body>
</html>
