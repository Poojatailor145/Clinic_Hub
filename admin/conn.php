<?php
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"clinichub");
if($con)
{
	echo "";
}
if(!$db)
{
	echo "Database not connected".mysqli_error();
}
?>