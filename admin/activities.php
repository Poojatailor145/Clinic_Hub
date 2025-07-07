<?php
include("conn.php");

$qry1="select * from clinic";
$res1=mysqli_query($con,$qry1);

?>


<!DOCTYPE html>
<html lang="en">



<head>
      <style type="text/css">
    .fa-star{
      color: orange;
    }
  </style>
   <?php include_once("topscripts.php");?>
</head>

<body>
    <div class="page-wrapper">
        <?php include_once("header.php");?>
        <?php include_once("nav.php");?>
           <div class="content">
                <?php
                while($row1=mysqli_fetch_array($res1))
                {
                    $qry="select * from feedback where clinicid=".$row1['clinicid'];
                    $res=mysqli_query($con,$qry);
                ?>
                <br><br>
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title"><?php echo $row1['clinicname'];?></h4>
                    </div>
                    
                </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <tr>
                  <th>Patient Name</th>
                  <th>Patient Email</th>
                  <th>Rating</th>
                  <th>Feedback</th>
                  <th>Date</th>
                </tr>

                <?php
                while($rowf=mysqli_fetch_array($res))
                {
                  $pqry="select * from patient where patientid=".$rowf['patientid'];
                  $pres=mysqli_query($con,$pqry);
                  $prow=mysqli_fetch_array($pres);
                  ?>
                  <tr>
                  <td><?php echo $prow[1];?></td>
                  <td><?php echo $prow[7];?></td>
                  <td>
                    <?php
                    if($rowf[4]==1)
                    {?>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==2)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==3)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==4)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>

                    <?php
                    if($rowf[4]==5)
                    {?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    <?php
                    }?>
                  </td>
                  <td><?php echo $rowf[5];?></td>
                  <td><?php echo $rowf[6];?></td>
                  </tr>
                <?php
                }?>
              </table>
            </div>
          </div>
                </div>
                <?php 
                }?>
            </div>
        </div>

    <div class="sidebar-overlay" data-reff=""></div>
    <?php include_once("bottomscripts.php");?>

</body>



</html>