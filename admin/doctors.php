<!DOCTYPE html>
<?php
include("conn.php");
$qry1="select * from clinic";
$res=mysqli_query($con,$qry1);

if(isset($_POST["km"]))
{
    $dmail=$_POST["kmid"];
    header("location:doctorinfo.php?dmail=$dmail");
}
?>

<html lang="en">
<head>
   <?php include_once("topscripts.php");?>
</head>

<body>
    <div class="main-wrapper">
       <?php include_once("header.php");?>
        <?php include_once("nav.php");?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    
                </div>
				<div class="row doctor-grid">
                    <?php
                    while($row=mysqli_fetch_array($res))
                    {?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><a href="profile.html"><?php echo $row['doctorname'];?></a></h4>
                            <div class="doc-prof"><?php echo $row['clinicname'];?></div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row['doctoremail'];?>
                            </div>
                            <form method="post">
                            <input type="submit" name="km" value="Know More" class="btn btn-success btn-lg">
                            <input type="hidden" name="kmid" id="apcl" value="<?php echo $row['doctoremail'];?>">
                            </form>
                        </div>
                    </div>

                    <?php
                    }?>
				
            </div>
            
		</div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <?php include_once("bottomscripts.php");?>

</body>



</html>