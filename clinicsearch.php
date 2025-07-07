<!doctype html>
<?php
include("conn.php");
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/clinicstyle.css">

    <title>ClinicHub - Find the Clinic</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">ClinicHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="clinicsearch.php">Find a Clinic</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            For Patients
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="glossary.php">Glossary</a></li>
            <li><a class="dropdown-item" href="faq.php">FAQs</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="clinicsearch.php">Book an appointment</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
      </ul>
      </div>
    </div>
  </nav>
  <br>

  
    <form method="post">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="areasearch" class="search" width="100" placeholder="Enter City">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit" name="search" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1   1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg>
      </button> 
      
    </form><br><br>

<?php
if(isset($_POST['search']))
{
  $searchcity=$_POST["areasearch"];
  ?>
  <div class="container-fluid" id="c1">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
      $imgs = array("img/c1.jpg", "img/c2.jpg", "img/c3.jpg", "img/c4.jpg", "img/c5.jpg", "img/c6.jpg","img/c7.jpg","img/c8.jpg","img/c9.jpg","img/c10.jfif");
      $query="select * from clinic where cliniccity='".$searchcity."'";
      $product=mysqli_query($con,$query);
      if(!empty($product))
      {
        while ($row=mysqli_fetch_array($product))
        {?>
            <div class="col">
          <div class="card h-100">
          <img src="<?php echo $imgs[rand(0,9)];?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><?= $row['clinicname'];?></h5>
        <p class="card-text"><?php echo $row['clinicaddress'];?></p>
        <p class="card-text"><?php echo $row['clinicarea'];?></p>
        <p class="card-text"><?php echo $row['cliniccity'];?></p>
        
        <a class="appbutton" href="registration.php?cid=<?php echo $row['clinicid'];?>"><button type="button" class="btn btn-primary">Make an appointment</button></a>
        <a class="appbutton" href="clinicprofile.php?cid=<?php echo $row['clinicid'];?>"><button type="button" class="btn btn-primary">Learn More</button></a>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
   <?php
        }
      }
   
    ?>

</div>


<?php
}else{
?>
  <div class="container-fluid" id="c1">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
      $imgs = array("img/c1.jpg", "img/c2.jpg", "img/c3.jpg", "img/c4.jpg", "img/c5.jpg", "img/c6.jpg","img/c7.jpg","img/c8.jpg","img/c9.jpg","img/c10.jfif");
      $query="select * from clinic";
      $product=mysqli_query($con,$query);
      if(!empty($product))
      {
        while ($row=mysqli_fetch_array($product))
        {?>
            <div class="col">
          <div class="card h-100">
          <img src="<?php echo $imgs[rand(0,9)];?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><?= $row['clinicname'];?></h5>
        <p class="card-text"><?php echo $row['clinicaddress'];?></p>
        <p class="card-text"><?php echo $row['clinicarea'];?></p>
        <p class="card-text"><?php echo $row['cliniccity'];?></p>
        
        <a class="appbutton" href="registration.php?cid=<?php echo $row['clinicid'];?>"><button type="button" class="btn btn-primary">Make an appointment</button></a>
        <a class="appbutton" href="clinicprofile.php?cid=<?php echo $row['clinicid'];?>"><button type="button" class="btn btn-primary">Learn More</button></a>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
   <?php
        }
      }
   
    ?>

</div>
<?php 
}?>



   


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>