<?php
    require_once('database.php');
    require_once('header.php');

    
    if ($_SESSION['role'] != "admin" && $_SESSION['role'] != "manager") {
        $_SESSION['error'] = "Must be admin or manager";
        echo '<script>alert("' . $_SESSION['error'] . '");</script>';
        header("location: welcome.php");
    }

    if(!empty($_POST)){
       $first_name=$_POST['first_name'];
       $last_name=$_POST['last_name'];
       $age=$_POST['age'];
       $gender=$_POST['gender'];
       $country=$_POST['country'];
       $email = $_POST['email'];
       $password = md5($_POST['password']);
       $role=$_POST['role'];
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, i nitial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <title>Student Form</title>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <h1>Add User</h1>
            </div>
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <td scope="col">First Name</td>
                            <td scope="col"><input type="text" name="first_name" placeholder="Enter your first name">
                            </td>
                        </tr>
                        <tr>
                            <td >Last Name</td>
                            <td  class="scope"><input type="text" name="last_name" placeholder="Enter your last name"></td>
                        </tr>
                        <tr>
                            <td class="scope">Age</td>
                            <td class="scope"><input type="number" name="age" id="age" placeholder="Enter your age"></td>
                        </tr>
                        <tr>
                            <td class="scope">Email</td>
                            <td class="scope"><input type="email" name="email" id="email" placeholder="Enter your email"></td>
                        </tr>
                        <tr>
                            <td class="scope">Password</td>
                            <td class="scope"><input type="password" name="password" id="password" placeholder="Enter your password"></td>
                        </tr>
                        <tr>
                            <td class="scope">Gender</td>
                            <td class="scope">
                                <input type="radio" name="gender" value="male" required>&nbsp;Male &nbsp;&nbsp;
                                <input type="radio" name="gender" value="female" required>&nbsp;Female
                            </td>
                        </tr>
                        <tr>
                            <td class="scope">Country</td>
                            <td class="scope">
                                <select name="country">
                                    <option value="">------Select a country------</option>
                                    <option value="nepal">nepal
                                    </option>
                                    <option value="india">india
                                    </option>
                                    <option value="japan">japan
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="scope">Role</td>
                            <td class="scope">
                                <select name="role">
                                    <option value="">------Select The Role-------</option>
                                    <option value="student" 
                                        >student
                                    </option>
                                    <option value="manager" 
                                        >manager
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="scope">Image</td>
                            <td class="scope"> <input type="file" name="image">
                            </td>
                        </tr>
                        <td>
                        <td>
                            <button>Submit</button>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>

</html>