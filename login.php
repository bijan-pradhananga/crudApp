<?php
    require_once('database.php');

    if(!empty($_POST)){
        $email=$_POST['email'];
        $password= md5($_POST['password']); 
        $sql = "SELECT * FROM student WHERE email = '$email' AND password='$password'";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_assoc($result);
        $findData = mysqli_num_rows($result);
        if($findData > 0){
            session_start(); 
            $_SESSION['first_name']=$row['first_name'];
            $_SESSION['last_name']=$row['last_name'];
            //For remember me 
            if(isset($_POST['remember_me'])){
               setcookie('email',$_POST['email'],time()+(60*60));
               setcookie('password',$_POST['password'],time()+(60*60));
            }
            else{
               setcookie('email',$_POST['email'],time()-(60*60));
               setcookie('password',$_POST['password'],time()-(60*60));
            }
            $_SESSION['role']=$row['role'];
            $_SESSION['auth']=TRUE;
            header("location:welcome.php");
        }else{
            $_SESSION['error']="invalid email and password";
            echo '<script>alert("' . $_SESSION['error'] . '");</script>';
        }

    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form</title>
      <link rel="stylesheet" href="css/login.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Login Form
         </div>
         <form action="#" method="post">
            <div class="field">
               <input type="text" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}else echo ''?>" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}else echo ''?>" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" name="remember_me">
                  <label for="remember_me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="register.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>