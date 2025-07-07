<?php
include("conn.php");
$qry="select * from clinic where clinicname='".$_GET["cname"]."'";
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);

if(isset($_POST["submit"]))
{
    $aname=$_POST["aname"];
    $amail=$_POST["amail"];
    $gen=$_POST["gender"];
    $dob=$_POST["dob"];
    $uname=$_POST["username"];
    $pass=$_POST["pass"];

    $insqry="insert into clinicadmin(clinicid,adminname,gender,dob,username,password,email) values('$row[0]','$aname','$gen','$dob','$uname','$pass','$amail')";
    $insres=mysqli_query($con,$insqry);
    if($insres==1)
    {
        header("location:login.php");
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

    <title>Admin Form</title>
</head>
<body>


  <div class="page-wrapper">
    <div class="content">
        <div class="row">
                    <div class="col-md-12">
                        <form method="post">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Admin Details</h4>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Admin Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="aname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Admin Email</label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control" name="amail" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Gender</label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" checked>
                                                    <label class="form-check-label" for="gender_male">
                                                    Male
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female">
                                                    <label class="form-check-label" for="gender_female">
                                                    Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Date of Birth</label>
                                            <div class="col-lg-9">
                                                <input type="date" class="form-control" name="dob" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">Login details</h4>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Username</label>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="username" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" name="pass" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        
    </div>
      
  </div>
  
</body>
</html>