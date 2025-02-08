<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/login.css">

</head>
<body>
   
<div class="wrapper">
   <div class="form-box login">
      
      <span class="icon-close">
         <ion-icon name="close"></ion-icon>
      </span>
      <form action="" method="post" enctype="multipart/form-data">
         <h2 style="text-align:center; color:#162938">LOGIN</h2>
         <?php
            if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
            }
         ?>
         <div class="input-box">
            <input type="email" name="email" class="box" required>
            <label>Email</label>
         </div>
         <div class="input-box">
            <input type="password" name="password" class="box" required>
            <label>Password</label>
         </div>
         <div class="remember-forgot" >
            <label><input type="checkbox" checked="checked" name="remember" >Remember me</label>
            <a href="#" class="forgot-pass">Forgot Password?</a>
         </div>
         <input type="submit" name="submit" value="Login" class="btn">
         <div class="login-register">
            <p>Don't have an account? <a href="register.php" class="signup-link">Sign Up</a></p>
         </div>
         
   </form>
         </div>

</div>
<script src="js/js.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>