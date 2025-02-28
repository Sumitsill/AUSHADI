<?php
session_start();

if(isset($_SESSION['username'])){
  header("location:dashboard.php");
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
    ></script>
    <link rel="stylesheet" href="css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
   
    <div class="container" style ="background-image: linear-gradient(-45deg,rgb(247, 247, 247) 0%, #1e9b22 100%)";>
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <p>
            <div class="input-field">
            <i class='bx bxs-user'></i>
              <input type="text" name="login_username" placeholder="Username" required/>
            </div>
            <div class="input-field">
            <i class='bx bxs-lock-alt' ></i>
              <input type="password" name="login_password" placeholder="Password" required/>
            </div>
            <input type="submit" value="Login" name="login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
              <i class='bx bxl-facebook-circle' ></i>
              </a>
              <a href="#" class="social-icon">
              <i class='bx bxl-twitter' ></i>
              </a>
              <a href="#" class="social-icon">
              <i class='bx bxl-google' ></i>
              </a>
              <a href="#" class="social-icon">
              <i class='bx bxl-linkedin-square' ></i>
              </a>
            </div>
          </form>
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
            
              <i class="fas fa-user"></i>
              <input type="text" name="fullname" placeholder="Full Name" required/>
            </div>

            <div class="input-field">
            
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" name="signup" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
              <i class='bx bxl-facebook-circle' ></i>
              </a>
              <a href="#" class="social-icon">
              <i class='bx bxl-twitter' ></i>
              </a>
              <a href="#" class="social-icon">
              <i class='bx bxl-google' ></i>
              </a>
              <a href="#" class="social-icon">
              <i class='bx bxl-linkedin-square' ></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
             Sign Up and start your journrey towards amazement!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="pixelcut-export.png" class="image" style="width: 70%;" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
             Login and resume your journey
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
  <?php
  include "backend/connect_db.php";

  if(isset($_POST['signup'])){
    $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $search_data = "select * from users where username='$username' or email='$email'";
    $search_query = mysqli_query($connect, $search_data);

    $search_count = mysqli_num_rows($search_query);

    if($search_count > 0){
      ?>
      <script>
        alert("Account with this username or email already exists.");
      </script>
      <?php
    }else{
      $encrypt_password = sha1($password);

      $insert_query = "INSERT INTO users (serial, full_name, username, email, password, signup_time) VALUES (NULL, '$fullname', '$username', '$email', '$encrypt_password', current_timestamp())";

      $submit_user_data = mysqli_query($connect, $insert_query);

      if($submit_user_data){
        $_SESSION['username'] = $username;
        ?>
        <script>
          location.replace("dashboard.php");
        </script>
        <?php
      }else{
        ?>
        <script>
          alert("Sign Up failed due to server error");
        </script>
        <?php
      }

    }
  }

  if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($connect, $_POST['login_username']);
    $password = sha1(mysqli_real_escape_string($connect, $_POST['login_password']));

    $search_data = "select * from users where username='$username' and password='$password'";
    $search_query = mysqli_query($connect, $search_data);

    $search_count = mysqli_num_rows($search_query);

    if($search_count > 0){
      while($row = mysqli_fetch_assoc($search_query)){
        $_SESSION['username'] = $row['username'];
      }
      ?>
      <script>
        location.replace("dashboard.php");
      </script>
      <?php
    }else{
      ?>
      <script>
        alert("Invalid login credentials...");
      </script>
      <?php
    }
  }
  ?>
</html>