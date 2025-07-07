<?php
include("conn.php");

$qry4="update appointment set status='canceled' where appointmentid=".$_GET["delapp"];
$res4=mysqli_query($con,$qry4); 

$cid=$_GET["cid"];

if($res4==1)
{
	header("location:adminappointment.php?cid=$cid");
}
?>