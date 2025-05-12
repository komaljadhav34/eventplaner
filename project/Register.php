<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

     $error[] = '<span style="color: red;">User already exists!</span>';
   }else{

      if($pass != $cpass){
        
        $error[] = '<span style="color: red;">password not matched!</span>';
      }else{
         $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  textfile="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
        
    <div class="form-box login">
        <h2>Register form</h2>
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
         <form action="" method="post">
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="user"></ion-icon>
                </span>        
                    <input type="text" name="name"required>
                    <label>User Name</label>
            </div>

            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>        
                    <input type="email" name="email"required>
                    <label>E-mail</label>
            </div>

            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                    <input type="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <label>Password</label>    
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                    <input type="Password" name="cpassword"required>
                    <label>Confirm password</label>    
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forget Password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Register</button>
            <div class="login-register">
            <p>already have an account? <a href="login.php">login now</a></p>
            </div>
        </form>
    </div>
    </div>

    <script src="script.js/"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <script>
    document.getElementById("registerForm").addEventListener("submit", function (e) {
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm_password").value;

      // Password pattern
      const passwordPattern =
        /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{4,7}$/;

      // Validate Password
      if (!passwordPattern.test(password)) {
        alert(
          "Password must be 4-7 characters long and include at least 1 uppercase, 1 lowercase, 1 number, and 1 special symbol."
        );
        e.preventDefault();
        return;
      }

      // Confirm Password
      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        e.preventDefault();
        return;
      }

      alert("Form submitted successfully!");
    });
  </script>
</body>
</html>