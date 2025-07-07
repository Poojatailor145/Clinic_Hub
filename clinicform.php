<?php
include("conn.php");

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

	$qry="insert into clinic(clinicname,clinicaddress,clinicarea,cliniccity,clinicpincode,starttime,endtime,contactno,clinicemail,spid,doctorname,doctoremail,doctorcontactno,contactpersonname,contactpersonno,status,entrydate) values('$clname','$cladd','$clarea','$clcity','$clpin','$sttime','$etime','$clno','$clmail','$special','$dname','$dmail','$dno','$cname','$cno','pending','$rd')";
	$res=mysqli_query($con,$qry);
	if($res==1)
	{
		header("location:adminform.php?cname=$clname");
	}
	
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
                                        <input type="text" class="form-control" name="clname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="cladd" required>
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Area</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clarea" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic City</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clcity" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Pincode</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clpin" required>
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
                                        <input type="time" class="form-control" name="sttime" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">End Time</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" name="etime" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clno" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Clinic Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="clmail" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Specialization</label>
                                    <select name="spec" class="col-md-9" style="border-color: skyblue;" required>
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
                                                <input type="text" class="form-control" name="dname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Doctor Email</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="dmail" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Doctor Contact no</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="dno" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Contact Person</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Contact Person No</label>
                                            <div class="col-md-9"> 
                                                <input type="text" class="form-control" name="cno" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>