<?php
    require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Registration Page</title>
    <link rel="stylesheet" href="css/register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="first_name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="last_name" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="number" name="age" placeholder="Enter your number" required>
          </div>

          <div class="input-box">
            <span class="details">Image</span>
            <input type="file" name="image" placeholder="Upload Your Image" style="line-height: 5.5vh;">
          </div>
        </div>
        <div class="gender-details">
        <input type="radio" name="gender" value="male" required id="dot-1">
          <input type="radio" name="gender" value="female" required id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three" style="display: none;"></span>
            <span class="gender"></span>
            </label>
          </div>
        </div>
        <div class="gender-details">
            <span class="gender-title">Country</span>
            <div class="category" style="width: 100%;">
                <select name="country" style="width: 100%; height: 5vh; text-align: center; " >
                    <option value="">------------Select a country------------</option>
                    <option value="nepal">nepal</option>
                    <option value="india">india</option>
                    <option value="japan">japan</option>
                </select>
            </div>
          </div>
         
        <div class="button">
          <input type="submit"  value="Register">
        </div>
          <a href="login.php">Already have an account?</a>
      </form>
    </div>

  </div>

  <?php 
         if(!empty($_POST)){
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $age=$_POST['age'];
            $gender=$_POST['gender'];
            $country=$_POST['country'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $role='student'; //Default
            $image='';
            if(!empty($_FILES['image']['name'])){
              $image=$_FILES['image']['name'];
              $tmp=$_FILES['image']['tmp_name'];
              $path='uploads/';
              move_uploaded_file($tmp,$path.$image);
           }
            $sql = "INSERT INTO student (first_name,last_name,age,gender,country,image,email,password,role) VALUES ('$first_name','$last_name',
            '$age','$gender','$country','$image','$email','$password','$role')";

            $result= mysqli_query($connection,$sql);
            if($result){
                echo '<script>alert("Record added successfully!");</script>';
            }
            else{
                echo '<script>alert("Error occured");</script>';
            }
        }
        
        ?>
</body>
</html>