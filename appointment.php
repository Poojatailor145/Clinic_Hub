<?php
include("conn.php");
$qry="select * from clinic where clinicname='".$_GET["cname"]."'";
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);

$qry2="select * from patient where patientname='".$_GET["pn"]."'";
$res2=mysqli_query($con,$qry2);
$row2=mysqli_fetch_array($res2);

$today = date('Y-m-d');

$starttime = $row['starttime'];
$endtime = $row['endtime'];

$cname=$row[1];
$pname=$row2[1];

if(isset($_POST["submit"]))
{
  $apdate=$_POST["appdate"];
  $aptime=$_POST["apptime"];
  $special=$_POST["spec"];
  $concern=$_POST["con"];
  $rd=date("Y/m/d");

  $qry1="insert into appointment(clinicid,patientid,appointmentdate,appointmenttime,status,entrydate,spid,concern) values('$row[0]','$row2[0]','$apdate','$aptime','upcoming','$rd','$special','$concern')";
  $res1=mysqli_query($con,$qry1);
 
  if($res1==1)
  {
    header("location:appointment-slip.php?cname=$cname&pn=$pname&dt=$rd");
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
    <div class="title">Appointment Details</div>
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Clinic Name</span>
            <input type="text" value="<?php echo $row[1];?>" name="clinicname" disabled required>
          </div>
          <div class="input-box">
            <span class="details">Patient Name</span>
            <input type="text" value="<?php echo $row2[1];?>" name="name" disabled required>
          </div>
          <div class="input-box">
            <span class="details">Appointment Date</span>
            <input type="date"  name="appdate" min="<?php echo $today;?>" required>
          </div>
          <div class="input-box">
            <span class="details">Appointment Time</span>
            <input type="time" name="apptime" min="<?php echo $starttime; ?>" max="<?php echo $endtime; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Specialization</span>
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
          <div class="input-box">
            <span class="details">Concern</span>
            <input type="text" name="con" placeholder="Enter your concern">
          </div>
          
        </div>
        
        <div class="button">
          <input type="submit" value="Confirm Appointment" name="submit">          
        </div>
      </form>
    </div>
  </div>

</body>
</html>
