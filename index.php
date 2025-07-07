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

    <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>ClinicHub</title>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="clinicsearch.php">Find a Clinic</a>
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


<div class="container-fluid p-0">
      <div class="site-content" style="background-image: url('img/1.jpg');">
        <div class="d-flex justify-content-center text-end">
          <div class="d-flex flex-column">
            <h1 class="site-title">REACH A DOCTOR WITH JUST A CLICK</h1>
            <p class="site-desc">We blend wireless monitoring and two-way video chat with specially trained caregivers to help the individuals you care about.</p><br><br>

            <div class="d-flex flex-row">
              <input type="button" value="Request An Appointment" class="btn site-btn2 px-4 py-3 mr-4 btn-light" onclick="location.href='clinicsearch.php';">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="section-1">
      <div class="container text-center">
        <h1 class="heading-1">Perfect Guidance</h1>
        <h1 class="heading-2">& achieve immediate help with ClinicHub</h1>
        <p class="para-1"> Compassion is at the heart of our care. At ClinicHub, unhurried, comprehensive evaluations offer the best chance of connecting you to the best clinics nearby .
          
        </p>

        <div class="row justify-content-center text-center">
          <div class="col-md-4">
            <div class="card">
              <img src="img/time.jpg" alt="Image1" class="card-img-top">
              <div class="card-body">
                <h4 class="card-title">Book on your<br> schedule</h4>
                <p class="card-text"> The clinics can be easily accessible. Request an appointment , anytime ,anywhere.Choose from thousands of expert doctors around you and get the treatment needed in just a click.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="img/treatment.jpg" alt="Image2" class="card-img-top">
              <div class="card-body">
                <h4 class="card-title">Effective treatment</h4>
                <p class="card-text">Our clinic's specialists collaborate across disciplines to evaluate your condition , and develop a diagnosis and treatment plan that's just for you.The friendly nature of the clinical staff will subtract the hours of the patient's sufferings and heal faster. </p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <img src="img/special.jfif" alt="Image3" class="card-img-top">
              <div class="card-body">
                <h4 class="card-title"><br>Great Services</h4>
                <p class="card-text">Search a trained doctor according to the specializations and get the proper diagnosis in time. You can also book a regular health checkup in the nearby clinics.</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="section-2">
      <div class="container-fluid" style="background-image: url('img/3.jpg');">
        <div class="d-flex justify-content-start">
          <div class="d-flex flex-column m-4">
            <h1 class="heading-1">Make your Clinic Reachable !</h1>
            <p class="para">Join us and add your clinic to the reach of the people near you . </p>
            <p class="para"> Already a member ?  <a href="login.php" style="color:white;font-size: 20px;">Sign In</a></p>
            
            <a href="clinicform.php"><input type="button" value="Join Us " class="btn btn-danger"></a>




          </div>
        </div>
      </div>
    </div><br><br>

    </div>
      <hr>
      <h5 style="color: #b89778"><center> ClinicHub &copy;</center></h5>
    </div>
  


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