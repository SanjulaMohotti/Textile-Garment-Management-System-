<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User Already Exist !'; 
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm Password Not Matched!';
      }elseif($image_size > 2000000){
         $message[] = 'Image Size Is Too Large !';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered Successfully !';
            header('location:login.php');
         }else{
            $message[] = 'Registeration Failed !';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/register.css">

</head>
<body>
   
   <div class="wrapper">
      <div class="form-box login">

         <span class="icon-close">
            <ion-icon name="close"></ion-icon>
         </span>

         <form action="" method="post" enctype="multipart/form-data">

            <h3>Sign Up</h3>

            <?php
               if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
               }
            }
            ?>

            <div class="input-box">
               <input type="text" name="name" class="box" required>
               <label>Username</label>
            </div>

            <div class="input-box">
               <input type="email" name="email" class="box" required>
               <label>Email</label>
            </div>

            <div class="input-box">
               <input type="password" name="password" class="box" required>
               <label>Password</label>
            </div>

            <div class="input-box">
            <input type="password" name="cpassword" class="box" required>
            <label>Confirm Password</label>
            </div>

            <div class="input-box file-input">
               <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
               <label>Profile Picture</label>
            </div>

            <input type="submit" name="submit" value="Sign Up" class="btn">
            <div class="login-register">
               <p>Already have an account? <a href="login.php">Login Now</a></p>
            </div>
         
         </form>
      </div>

   </div>
   <script src="js/js.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>