<?php
include("conn.php");
$qry1="select * from clinic where clinicid=".$_GET["cid"];
$res1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_array($res1);

if(isset($_POST["submit"]))
{
	$clname=$_POST["clname"];
	$pmail=$_POST["pmail"];
	$rate=$_POST["rate"];
	$comment=$_POST["comment"];
	$rd=date("Y/m/d");
	$appid=1;

	$cqry="select * from clinic where clinicname='".$clname."'";
	$cres=mysqli_query($con,$cqry);
	$crow=mysqli_fetch_array($cres);

	$pqry="select * from patient where patientemail='".$pmail."'";
	$pres=mysqli_query($con,$pqry);
	$prow=mysqli_fetch_array($pres);	

	$qry="insert into feedback(appointmentid,patientid,clinicid,rating,comment,rdate) values('$appid','$prow[0]','$crow[0]','$rate','$comment','$rd')";
	$res=mysqli_query($con,$qry);
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
	<title>ClinicHub: Reviews</title>

	<style type="text/css">
	</style>
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Feeback Details</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Clinic Name</label>
										<input class="form-control" type="text" readonly name="clname" value="<?php echo $row1['clinicname'];?>">
									</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Patient Name</label>
										<input class="form-control" type="text" name="pname">
									</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Patient Email</label>
										<input class="form-control" type="text" name="pmail" >
									</div>
                                </div>
                                <div class="col-md-6 form-group">
                                	<div class="form-group">
                                		<label>Ratings</label>
								    <input type="number" id="rating-control" class="form-control" step="1" max="5" placeholder="Rate 1 - 5" name="rate">
								    </div>
								  </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" class="form-control" name="comment"></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit" onclick="thanks();">Submit Review</button>
                            </div><br>
                            <center>
                            <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="clinicprofile.php?cid=<?php echo $row1[0];?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Go Back</a>
                    </div></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

<script type="text/javascript">
	function thanks() {
		alert("Thank You for your feedback");
	}

</script>