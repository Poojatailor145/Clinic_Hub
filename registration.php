<?php
include("conn.php");
$qry="select * from clinic where clinicid=".$_GET["cid"];

$res=mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);

if(isset($_POST["submit"]))
{
  $pname=$_POST["name"];
  $pno=$_POST["no"];
  $address=$_POST["addr"];
  $area=$_POST["parea"];
  $city=$_POST["pcity"];
  $dob=$_POST["pdob"];
  $age=$_POST["page"];
  $gen=$_POST["gender"];
  $clname=$_POST["clinicname"];
  $email=$_POST["pmail"];
  $rd=date("Y/m/d");

  $qry1="insert into patient(patientname,patientno,patientaddress,patientarea,patientcity,patientemail,dob,age,gender,rdate) values('$pname','$pno','$address','$area','$city','$email','$dob','$age','$gen','$rd')";
  $res1=mysqli_query($con,$qry1);

  if($res==1)
  {
    header("location:appointment.php?cname=$clname&pn=$pname");
  }
}


?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="css/regstyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Patient Details</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
        	<div class="input-box">
            <span class="details">Clinic Name</span>
            <input type="text" value="<?php echo $row[1];?>" name="clinicname" required>
          </div>
          <div class="input-box">
            <span class="details">Patient Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
          </div>
          <div class="input-box">
            <span class="details">Contact No</span>
            <input type="text" placeholder="Enter your contact no" name="no" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your address" name="addr" required>
          </div>
          <div class="input-box">
            <span class="details">Area</span>
            <input type="text" placeholder="Enter your area" name="parea" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" placeholder="Enter your city" name="pcity" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your e-mail" name="pmail" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="pdob" required>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="number" placeholder="Enter your age" name="page" required min="1">
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>
        <div class="button">
        <input type="submit" value="Register" name="submit">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
