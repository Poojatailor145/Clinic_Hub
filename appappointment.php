<?php
include("conn.php");

$qry4="update appointment set status='visited' where appointmentid=".$_GET["apapp"];
$res4=mysqli_query($con,$qry4);
$row=mysqli_fetch_array($res4);

$qry="select * from patient where patientid=".$row[2];
$res=mysqli_query($con,$qry);
$row2=mysqli_fetch_array($res);
$tomail=$row2[7];

$cid=$_GET["cid"];

if($res4==1)
{    
	header("location:adminappointment.php?cid=$cid");
}
?>