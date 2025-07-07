<?php
include("conn.php");
$qry="select * from clinic where clinicid=".$_GET["cid"];
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);

if(isset($_POST["submit"]))
{
	$clname=$_POST["clname"];
	$cladd=$_POST["cladd"];
	$clarea=$_POST["clarea"];
	$clcity=$_POST["clcity"];
	$clpin=$_POST["clpin"];
	$sttime=$_POST["sttime"];
	$etime=$_POST["etime"];
	$clno=$_POST["clno"];
	$clmail=$_POST["clmail"];
 	$special=$_POST["spec"];
	$dname=$_POST["dname"];
	$dmail=$_POST["dmail"];
	$dno=$_POST["dno"];
	$cname=$_POST["cname"];
	$cno=$_POST["cno"];
	$rd=date("Y/m/d");

    $qry1="update clinic set clinicname='$clname',clinicaddress='$cladd',clinicarea='$clarea',cliniccity='$clcity',clinicpincode='$clpin',starttime='$sttime',endtime='$etime',contactno='$clno',clinicemail='$clmail',doctorname='$dname',doctoremail='$dmail',doctorcontactno='$dno',contactpersonname='$cname',contactpersonno='$cno' where clinicid=$row[0]  ";
	$res1=mysqli_query($con,$qry1);
	if($res1==1)
	{
		header("location:clinicmain.php?cid=$row[0]");
	}
	
}
if(isset($_POST["logout"]))
{
    header("location:logout.php");
}

?>


<!DOCTYPE html>
<html>

	<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <title>ClinicHub - Clinic Registration</title>
	
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $row['clinicname'];?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="clinicmain.php?cid=<?php echo $row[0];?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="clinicsearch.php">Appointments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="clinicsearch.php">Patients</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="about.php">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Admin</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="login.php"><button class="btn btn-outline-danger">Log Out</button></a>
      </form>
      </div>
    </div>
  </nav>


        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Clinic Registration</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="card-title">Clinic Details</h4>
                            <form method="post">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clname" value="<?php echo $row[1];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="cladd" value="<?php echo $row[2];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Area</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clarea" value="<?php echo $row[3];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic City</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clcity" value="<?php echo $row[4];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Pincode</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clpin" value="<?php echo $row[5];?>">
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="card-title"></h4>
                            
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Start Time</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" name="sttime" value="<?php echo $row[6];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">End Time</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" name="etime" value="<?php echo $row[7];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clno" value="<?php echo $row[8];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="clmail" value="<?php echo $row[9];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Specialization</label>
                                    <select name="spec" class="col-md-9" style="border-color: skyblue;">
									    <option value="1">General Medicine</option>
									    <option value="2">Gynaecology & Obstetrics</option>
									    <option value="3">Paediatrics</option>
									    <option value="4">Dermatology</option>
									    <option value="5">ENT</option>
									    <option value="6">Cardiology</option>
									    <option value="7">Orthopaedics</option>
									    <option value="8">Dentistry</option>
									    <option value="9">Diabetology</option>
									    <option value="10">Nutrition & Dietetics</option>
									    <option value="11">Psyciatry</option>
									</select>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="card-title">Doctor Details</h4>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Doctor Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="dname" value="<?php echo $row[11];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Doctor Email</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="dmail" value="<?php echo $row[12];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Doctor Contact no</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="dno" value="<?php echo $row[13];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Contact Person</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cname" value="<?php echo $row[14];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Contact Person No</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cno" value="<?php echo $row[15];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>