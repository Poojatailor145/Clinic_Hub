<?php
include("conn.php");
 $clqry="select * from clinic where clinicname='".$_GET["cname"]."'";
 $res=mysqli_query($con,$clqry);
 $row=mysqli_fetch_array($res);

 $ptqry="select * from patient where patientname='".$_GET["pn"]."'";
 $res2=mysqli_query($con,$ptqry);
 $row2=mysqli_fetch_array($res2);

 $cid=$row[0];
 $pid=$row2[0];
 $rd=date("Y/m/d");

$apqry="select * FROM appointment where clinicid=".$row[0]." and patientid=".$row2[0]." and entrydate='".$_GET['dt']."'";
$res3=mysqli_query($con,$apqry);
$row3=mysqli_fetch_array($res3);

$mqry="select * from patient where patientid=".$row3[2];
$mres=mysqli_query($con,$mqry);
$mrow=mysqli_fetch_array($mres);
$tomail=$mrow[7];

if(isset($_POST["cancel"]))
{   
    $delqry="delete from appointment where appointmentid =".$row3[0];
    $resdel=mysqli_query($con,$delqry);
    if($resdel)
    {
        header("location:clinicsearch.php");
    }
}

if(isset($_POST["confirm"]))
{   
    $txt1="Clinic Name : ".$row[1];
    $txt2="Appointment Date : ".$row3[3];
    $txt3="Appointment Time : ".$row3[4];
    $txt4="Concern : ".$row3[8];
    $txt5="Kindly show this confirmation at the time of appointment .";
    $to_email=$tomail;
    $subject="Appointment Confirmation";
    $body="Your appointment is confirmed \r\n\r\n".$txt1."\r\n".$txt2."\r\n".$txt3."\r\n".$txt4."\r\n\r\n".$txt5;
    $headers="From: poojatailor145@gmail.com";

    if(!mail($to_email,$subject,$body,$headers))
    {
        echo "pass";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/profile.css">
	<title>ClinicHub-Appointment Slip</title>
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
                    <div id="alert" style="color: green;">
                        
                    </div>
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Appointment Slip</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="payslip-title">Appointment Confirmation</h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <ul class="list-unstyled mb-0">
                                        <li style="font-size:20px;color:blue;"><strong><?php echo $row[1];?></strong></li>
                                        <li><?php echo $row[2];?></li>
                                        <li><?php echo $row[3];?></li>
                                        <li><?php echo $row[4];?></li>
                                        <li><?php echo $row[5];?></li>
                                        <li>Start Time : <?php echo $row[6];?></li>
                                        <li>End Time : <?php echo $row[7];?></li>
                                        <li>Email : <?php echo $row[9];?></li>

                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Appointment No <?php echo $row3[0];?> </h3>
                                        <ul class="list-unstyled">
                                            <li>Date: <span><?php echo $rd;?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Patient Name : <?php echo $row2[1];?></strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Address : </strong> <span class="float-right"><?php echo $row2[3];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Area : </strong> <span class="float-right"><?php echo $row2[4];?> , <?php echo $row2[5];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date of Birth : </strong> <span class="float-right"><?php echo $row2[8];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender : </strong> <span class="float-right"><?php echo $row2[10];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Age</strong> <span class="float-right"><strong><?php echo $row2[9];?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Appointment</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Appointment Date : </strong> <span class="float-right"><?php echo $row3[3];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Apppointment Time : </strong> <span class="float-right"><?php echo $row3[4];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Concern : </strong> <span class="float-right"><?php echo $row3[8];?></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p><strong>Confirm the appointment </strong> to receive the confirmation email.</p>
                                </div>

                                <div>
                                    <center>
                                        <form method="post">
                                            <a class="appbutton"><input type="submit" class="btn btn-primary" name="confirm" value="Confirm" onclick="confirmation()"></a>
                                            <a class="appbutton"><input type="submit" class="btn btn-primary" name="cancel" value="Cancel"></a>
                                        </form>
                                </center>
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

<script type="text/javascript">
    function confirmation()
    {
       alert("Your appointment is Confirmed.Kindly check your email.");

    }
</script>