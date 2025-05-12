<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']); // Encrypt password using md5

   // Check if email and password match in the database
   $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $_SESSION['user_name'] = $row['name'];
      header('location:addevent.html');
   }else{
      $error[] = 'Incorrect email or password!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <style>
        .error-msg {
            color: white;
            background-color: red;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
        
    <div class="form-box login">
        <h2>Login</h2>
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
                    <ion-icon name="mail"></ion-icon>
                </span>        
                    <input type="email" name="email" required>
                    <label>E-mail</label>
            </div>

            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                    <input type="password" name="password" required>
                    <label>Password</label>    
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forget Password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div class="login-register">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
            </div>
        </form>
    </div>
    </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
