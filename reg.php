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
  $date=$_POST["appdate"];
  $time=$_POST["apptime"];
  $special=$_POST["spec"];
  $gen=$_POST["gender"];
  $concern=$_POST["conc"];
  $clname=$_POST["clinicname"];
  $cdate = date('Y-m-d H:i:s');

  $clid="select clinicid from clinic where clinicname='$clname';";
  $rescl=mysqli_query($con,$clid);
  $row2=mysqli_fetch_array($rescl);


  $qry1="insert into patient(patientid,patientname,patientno,patientaddress,patientarea,patientcity,dob,age,gender,rdate) values(1,'$pname','$address','$area','$city','$dob','$age','$gen','$cdate')";
  $res1=mysqli_query($con,$qry1);
  $qry2="insert into appointment(appointmentid,clinicid,patientid,appointmentdate,appointmenttime,status,entrydate,spid,concern) values(1,'$row2[0]','$1','$date','$time','upcoming','$cdate','$special','$concern')";
  $res2=mysqli_query($con,$qry2);
  if($res1==1)
  {
    echo "<br>Patient Data inserted";
  }
  if($res2==1)
  {
    echo "<br>Appointment Data inserted";
  }
  mysqli_close($con);
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
    <div class="title">Appointment Details</div>
    <div class="content">
      <form method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Clinic Name</span>
            <input type="text" name="clinicname" value="<?php echo $row['clinicname'];?>">
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
            <span class="details">Date of Birth</span>
            <input type="date" name="pdob" required>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="number" placeholder="Enter your age" name="page" required min="1">
          </div>
          <div class="input-box">
            <span class="details">Appointment Date</span>
            <input type="date" name="appdate">
          </div>
          <div class="input-box">
            <span class="details">Appointment Time</span>
            <input type="time" name="apptime" >
          </div>
          <div class="input-box">
            <span class="details">Concern</span>
            <input type="text" name="conc" >
          </div>
          <div class="input-box">
            <span class="details">Select Specialization</span>
            <select name="spec">
              <option value="1">General Medicine</option>
              <option value="2">Gynaecology & Obstetrics</option>
              <option value="3">Paediatrics</option>
              <option value="4">Dermatology</option>
              <option value="5">ENT</option>
              <option value="6">Cardiology</option>
              <option value="7">Orthopaedics</option>
              <option value="8">Dentistry</option>
              <option value="9">Diabetology</option>
              <option value="10">Nutrition & Dietetics</option>
              <option value="11">Psyciatry</option>
            </select>
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
