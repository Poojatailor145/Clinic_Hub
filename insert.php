<?php 
include("conn.php");
if (isset($_POST['Submit']))
		{
			$cname=$_POST['clinicname'];
			$cadd=$_POST['clinicaddress'];
			$carea=$_POST['clinicarea'];
			$ccity=$_POST['cliniccity'];
			$cpin=$_POST['clinicpincode'];
			$stime=$_POST['starttime'];
			$etime=$_POST['endtime'];
			$cno=$_POST['contactno'];
			$cmail=$_POST['clinicemail'];
			$sid=$_POST['spid'];
			$dname=$_POST['doctorname'];
			$dmail=$_POST['doctoremail'];
			$dno=$_POST['doctorno'];
			$cname=$_POST['cpname'];
			$cno=$_POST['cpno'];
			$cstatus="pending";
			$edate=date("Y/m/d");

			$sql="insert into clinic(clinicname,clinicaddress,clinicarea,cliniccity,clinicpincode,starttime,endtime,contactno,clinicemail,spid,doctorname,doctoremail,doctorcontactno,contactpersonname,contactpersonno,status,entrydate) values ('$cname','$cadd','$carea','$ccity','$cpin','$stime','$etime','$cno','$cmail','$sid','$dmail','$dname','$dno','$cname','$cno','$cstatus','$edate')";

			if(mysqli_query($con,$sql))
			{
				echo"New Recorded inserted";
			}
			else
			{
				echo"Error" .'<br>' . mysqli_error($con);
			}
		}
?>
<!DOCTYPE html>
<html lang=en>
<head>
	<title>Document</title>
	</head>
	<body>
		<h1 align="center">Insert Details of CLINIC</h1>
		<form method="post">
			<table>
			
				<tr>
					<td>Clinic Name</td>
					<td><input type="text" name="clinicname" required></td>
				</tr>
				<tr>
					<td>Clinic Address</td>
					<td><input type="text" name="clinicaddress" required></td>
				</tr>
				<tr>
					<td>Clinic Area</td>
					<td><input type="text" name="clinicarea" required></td>
				</tr>
				<tr>
					<td>Clinic City</td>
					<td><input type="text" name="cliniccity" required></td>
				</tr>
				<tr>
					<td>Clinic Pincode</td>
					<td><input type="number" name="clinicpincode" required></td>
				</tr>
				<tr>
					<td>Start Time</td>
					<td><input type="time" name="starttime" required></td>
				</tr>
				<tr>
					<td>End Time</td>
					<td><input type="time" name="endtime" required></td>
				</tr>
				<tr>
					<td>Contact No.</td>
					<td><input type="text" name="contactno" required></td>
				</tr>
				<tr>
					<td>Clinic Email</td>
					<td><input type="email" name="clinicemail" required></td>
				</tr>
				<tr>
					<td>Specialization ID</td>
					<td><input type="number" name="spid" required></td>
				</tr>
				<tr>
					<td>Doctor Name</td>
					<td><input type="text" name="doctorname" required></td>
				</tr>
				<tr>
					<td>Doctor Email</td>
					<td><input type="email" name="doctoremail" required></td>
				</tr>
				<tr>
					<td>Doctor No.</td>
					<td><input type="text" name="doctorno" required></td>
				</tr>
				<tr>
					<td>Contact Person Name</td>
					<td><input type="text" name="cpname" required></td>
				</tr>
				<tr>
					<td>Contact Person No.</td>
					<td><input type="text" name="cpno" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="Submit" required></td>
				</tr>

				</table>

		</form>
	</body>

<p><a href="display.php">SHOW CLINIC DETAILS</a></p>

	</body>
	</html>
