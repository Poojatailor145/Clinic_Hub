n<!DOCTYPE html>
<?php
include("conn.php");
$qry1="select * from specialization";
$res=mysqli_query($con,$qry1);
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
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">Specializations</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Specialization Name</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n=1;
                                    while($row=mysqli_fetch_array($res))
                                    {?>
                                    <tr>
                                        <td><?php echo $n;?></td>
                                        <td><?php echo $row['spname'];?></td>
                                        <td><span class="custom-badge status-green">Active</span></td>
                                    </tr>

                                    <?php
                                    $n++;
                                    }?>
                                </tbody>
                            </table>
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