<?php
include("conn.php");
session_start();
$qry="select * from superadmin where adminid=".$_SESSION["adminid"];
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

    $qry2="update clinicadmin set adminname='$aname',gender='$gen',dob='$dob',username='$uname',password='$pass',email='$amail' where adminid=$row[0]  ";
    $insres=mysqli_query($con,$qry2);
    if($insres==1)
    {
        header("location:edit-profile.php");
    }

}

if(isset($_POST["logout"]))
{
    header("location:login.php");
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
    <?php include_once("topscripts.php");?>
</head>
<body>

  <div class="page-wrapper">
    <?php include_once("header.php");?>
        <?php include_once("nav.php");?>
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
                                                <input type="text" class="form-control" name="aname" value="<?php echo $row[1];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Admin Email</label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control" name="amail" value="<?php echo $row[6];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Gender</label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" <?php if($row['gender']=="Male") echo "checked";?> >
                                                    <label class="form-check-label" for="gender_male">
                                                    Male
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female" <?php if($row['gender']=="Female") echo "checked";?>>
                                                    <label class="form-check-label" for="gender_female">
                                                    Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Date of Birth</label>
                                            <div class="col-lg-9">
                                                <input type="date" class="form-control" name="dob" value="<?php echo $row[3];?>">
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
                                                        <input type="text" class="form-control" name="username" value="<?php echo $row[4];?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" name="pass" value="<?php echo $row[5];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        
    </div>
      
  </div>

    <div class="sidebar-overlay" data-reff=""></div>
    <?php include_once("bottomscripts.php");?>
</body>
</html>