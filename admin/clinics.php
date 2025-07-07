<!DOCTYPE html>
<?php
include("conn.php");
$qry1="select * from clinic where status='approved'";
$res=mysqli_query($con,$qry1);

$qry2="select * from clinic where status='pending'";
$res2=mysqli_query($con,$qry2);

$qry3="select * from clinic where status='declined'";
$res3=mysqli_query($con,$qry3);

if(isset($_POST["apdecline"]))
{
    $id=$_POST["apcl"];
    $qry="update clinic set status='declined' where clinicid=".$id;
    $res=mysqli_query($con,$qry);
    header("location:clinics.php");
}

if(isset($_POST["redecline"]))
{
    $id=$_POST["recl"];
    $qry="update clinic set status='declined' where clinicid=".$id;
    $res=mysqli_query($con,$qry);
    header("location:clinics.php");
}

if(isset($_POST["reapprove"]))
{
    $id=$_POST["recl"];
    $qry="update clinic set status='approved' where clinicid=".$id;
    $res=mysqli_query($con,$qry);
    header("location:clinics.php");
}

if(isset($_POST["deapprove"]))
{
    $id=$_POST["decl"];
    $qry="update clinic set status='approved' where clinicid=".$id;
    $res=mysqli_query($con,$qry);
    header("location:clinics.php");
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
                        <h4 class="page-title">Clinics Approved</h4>
                    </div>

                    </div>
                    <div class="row doctor-grid">
                    <?php
                    while ($row1=mysqli_fetch_array($res))
                    {?>

                
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><a href="profile.html"><?php echo $row1['clinicname'];?></a></h4>
                            <div class="doc-prof">Gynecology</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row1['clinicemail'];?>
                            </div>

                            <form method="post">
                            <input type="submit" name="apdecline" value="Decline" class="btn btn-danger btn-lg">
                            <input type="hidden" name="apcl" id="apcl" value="<?php echo $row1['clinicid'];?>">
                            </form>
                        </div>
                    </div>
                    <?php
                    }?>               
                    </div>

                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Clinics Requests</h4>
                    </div>
                    
                </div>
                <div class="row doctor-grid">

                    <?php
                    while ($row2=mysqli_fetch_array($res2))
                    {?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><a href="profile.html"><?php echo $row2['clinicname'];?></a></h4>
                            <div class="doc-prof">Gynecology</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row2['clinicemail'];?>
                            </div>
                            
                            <form method="post">
                            <input type="submit" name="redecline" value="Decline" class="btn btn-danger btn-lg">
                            <input type="submit" name="reapprove" value="Approve" class="btn btn-success btn-lg">
                            <input type="hidden" name="recl" id="recl" value="<?php echo $row2['clinicid'];?>">
                            </form>
                        </div>
                    </div>

                    <?php
                    }?>               
                    
                </div>

                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Clinics Declined</h4>
                    </div>
                    
                </div>
                <div class="row doctor-grid">
                    <?php
                    while ($row3=mysqli_fetch_array($res3))
                    {?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><a href="profile.html"><?php echo $row3['clinicname'];?></a></h4>
                            <div class="doc-prof">Gynecology</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row3['clinicemail'];?>
                            </div>

                           <form method="post">
                            <input type="submit" name="deapprove" value="Approve" class="btn btn-success btn-lg"> 
                            <input type="hidden" name="decl" id="decl" value="<?php echo $row3['clinicid'];?>">

                            </form>
                        </div>
                    </div>

                    <?php
                    }?>                   
                </div>
				
            </div>
            
		</div>
        </div>

        
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <?php include_once("bottomscripts.php");?>

</body>



</html>