<?php
include("snavbar.php");
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
  <div class="home_content">
    <div class="text"> <font size="20px">Admin Dashboard</font></div>
    <br><br>
    <div class="row1">

      <div class="column">
        <div class="dashcard-1">
        <div class="desc">
            <span>New Visits</span><br> 
            <span>43,281</span>          
        </div>
        <div class="desc">
          <i class="bx bx-upvote bx-burst bx-rotate-270 bx-md" ></i>    
        </div>
      </div>
      </div>

      <div class="column">
        <div class="dashcard-2">
        <div class="desc">
            <span>Clinics</span><br> 
            <span>654</span>          
        </div>
        <div class="desc">
          <i class="bx bx-clinic bx-tada bx-md" ></i>    
        </div>
      </div>
      </div>  

      <div class="column">
        <div class="dashcard-3">
        <div class="desc">
            <span>Appointments</span><br> 
            <span>97</span>          
        </div>
        <div class="desc">
          <i class="bx bx-calendar bx-flashing bx-md" ></i>    
        </div>
      </div>
      </div>

      <div class="column">
        <div class="dashcard-4">
        <div class="desc">
            <span>Patients</span><br> 
            <span>168</span>          
        </div>
        <div class="desc">
          <i class="bx bx-user-voice bx-spin bx-md" ></i>    
        </div>
      </div>
      </div>

      <div class="column">
        <div class="dashcard-5">
        <div class="desc">
            <span>Revenue</span><br> 
            <span>89,745</span>          
        </div>
        <div class="desc">
          <i class="bx bx-rupee bx-fade-up bx-md" ></i>    
        </div>
      </div>
      </div>     

      
      
    </div>
  </div>

      

  <script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");
   let searchBtn = document.querySelector(".bx-search");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
     if(btn.classList.contains("bx-menu")){
       btn.classList.replace("bx-menu" , "bx-menu-alt-right");
     }else{
       btn.classList.replace("bx-menu-alt-right", "bx-menu");
     }
   }
   searchBtn.onclick = function() {
     sidebar.classList.toggle("active");
   }
  </script>

</body>
</html>
