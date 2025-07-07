<?php
include("conn.php");
$err="";
$err1="";


if(isset($_POST["signin"]))
{

  $uname=$_POST["username"];
  $pass=$_POST["pass"];

  $qry="select * from clinicadmin where username='".$uname."' and password='".$pass."'";
  $res=mysqli_query($con,$qry);
  $row=mysqli_fetch_array($res);
  if(mysqli_num_rows($res)==1)
  {
    session_start();
    $_SESSION["clinicid"]=$row[1];
    header("location:clinicmain.php");
  }
  else
  {
    $err="Invalid Credentials";
  }
}

if(isset($_POST["home"]))
{
  header("location:index.php");
}
if(isset($_POST["signup"]))
{

  $mail=$_POST["smail"];
  $pass=$_POST["spass"];

  $qry="select * from superadmin where adminemail='".$mail."' and password='".$pass."'";
  $res=mysqli_query($con,$qry);
  $row=mysqli_fetch_array($res);
  
  if(mysqli_num_rows($res)==1)
  {
    session_start();
    $_SESSION["adminid"] = $row[0];
    header("location:admin\index.php");
  }
  else
  {
      $err1="Invalid Credentials";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    >
    </script>
    <link rel="stylesheet" href="css/loginstyle.css" />
    <title>ClinicHub - Super Admin Portal</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form" method="post">
            <h2 class="title">Clinic Admin</h2>
            <h2 class="title">Sign in</h2>
            <span style="color:red"><?php echo $err;?></span>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pass" />
            </div>
            <input type="submit" value="Login" class="btn solid" name="signin" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form method="post" class="sign-up-form">
            <h2 class="title">Super Admin </h2>
            <h2 class="title">Log In </h2>
            <span style="color:red"><?php echo $err1;?></span>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="smail" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="spass" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" name="signup" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Administrator ?</h3>
            <p>
              Login here to join ClinicHub and connect with the management team .
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Log In
            </button><br>
            <form method="post">
            <button class="btn transparent" id="home" name="home">
              Home
            </button>
            </form>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of the clinic admins ?</h3>
            <p>
              Sign in and continue making ClinicHub a better way for the users to get immediate help.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign In 
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>