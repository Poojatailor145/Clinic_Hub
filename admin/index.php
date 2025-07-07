n<!DOCTYPE html>
<?php
include("conn.php");
$qry1="select count(*) from clinic where status='approved'";
$res1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_array($res1);

$qry2="select count(*) from patient";
$res2=mysqli_query($con,$qry2);
$row2=mysqli_fetch_array($res2);

$qry3="select count(*) from appointment";
$res3=mysqli_query($con,$qry3);
$row3=mysqli_fetch_array($res3);

$qry4="select count(*) from clinic where status='pending'";
$res4=mysqli_query($con,$qry4);
$row4=mysqli_fetch_array($res4);

$rd=date("Y/m/d");

$qry5="SELECT patientname,patientaddress,doctorname,appointmenttime FROM patient p JOIN appointment a ON p.patientid=a.patientid JOIN clinic c ON c.clinicid=a.clinicid where a.status='upcoming';";
$res5=mysqli_query($con,$qry5);

$qry6="select clinic.doctorname,specialization.spname from clinic inner join specialization on clinic.spid=specialization.spid;";
$res6=mysqli_query($con,$qry6);

$qry7="
select patient.patientname,patient.patientemail,patient.patientno,appointment.concern from patient inner join appointment on patient.patientid=appointment.patientid;";
$res7=mysqli_query($con,$qry7);



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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row1[0];?></h3>
                                <span class="widget-title1">Clinics <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row2[0];?></h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row3[0];?></h3>
                                <span class="widget-title3">Appointments <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row4[0];?></h3>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card member-panel">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.php" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="d-none">
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Doctor Name</th>
                                                <th>Timing</th>
                                                <th class="text-right">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            while($row5=mysqli_fetch_array($res5))
                                            {?>
                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">P</a>
                                                    <h2><a href="profile.html"><?php echo $row5[0];?> <span><?php echo $row5[1];?> </span></a></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0">Appointment With</h5>
                                                    <p><?php echo $row5[2];?> </p>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">Timing</h5>
                                                    <p><?php echo $row5[3];?> </p>
                                                </td>
                                                <td class="text-right">
                                                    <a href="appointments.php" class="btn btn-outline-primary take-btn">View</a>
                                                </td>
                                            </tr>
                                            <?php
                                            }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Doctors</h4>
                            </div>
                            <div class="card-body p-0">
                                <ul class="contact-list">
                                    <?php
                                    while($row6=mysqli_fetch_array($res6))
                                    {?>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><?php echo $row6[0];?></span>
                                                <span class="contact-date"><?php echo $row6[1];?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    }?>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.php" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card member-panel">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">New Patients</h4> <a href="patients.php" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="d-none">
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Patient Email</th>
                                                <th>Contact No</th>
                                                <th class="text-right">Concern</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            while($row7=mysqli_fetch_array($res7))
                                            {?>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2><?php echo $row7[0];?></h2>
                                                </td>
                                                <td><?php echo $row7[1];?></td>
                                                <td><?php echo $row7[2];?></td>
                                                <td><button class="btn btn-primary btn-primary-one float-right"><?php echo $row7[3];?></button></td>
                                            </tr>
                                            <?php
                                            }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                
                    
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <?php include_once("bottomscripts.php");?>

</body>



</html>