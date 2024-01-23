<?php
    require_once('database.php');
    require_once('header.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM student WHERE id='$id'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
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
                <h1>Update your info</h1>
            </div>
            <div class="row">
                <div class="col-8">
                    <table class="table">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <tr>
                            <td scope="col">First Name</td>
                            <td scope="col"><input type="text" name="first_name" placeholder="Enter your first name"
                                    value="<?php echo $row['first_name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><input type="text" name="last_name" placeholder="Enter your last name"
                                    value="<?php echo $row['last_name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><input type="number" name="age" id="age" placeholder="Enter your age"
                                    value="<?php echo $row['age']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <input type="radio" name="gender" value="male" required <?php if ($row['gender']=='male'
                                    ) echo 'checked' ;?>>Male
                                <input type="radio" name="gender" value="female" required <?php if
                                    ($row['gender']=='female' ) echo 'checked' ;?>>Female
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>
                                <select name="country">
                                    <option value="">------Select a country------</option>
                                    <option value="nepal" <?php if ($row['country']=='nepal' ) echo 'selected' ; ?>
                                        >nepal
                                    </option>
                                    <option value="india" <?php if ($row['country']=='india' ) echo 'selected' ; ?>
                                        >india
                                    </option>
                                    <option value="japan" <?php if ($row['country']=='japan' ) echo 'selected' ; ?>
                                        >japan
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>
                                <select name="role">
                                    <option value="">------Select The Role------</option>
                                    <option value="student" <?php if ($row['role']=='student' ) echo 'selected' ; ?>
                                        >student
                                    </option>
                                    <option value="admin" <?php if ($row['role']=='admin' ) echo 'selected' ; ?>
                                        >admin
                                    </option>
                                    <option value="manager" <?php if ($row['role']=='manager' ) echo 'selected' ; ?>
                                        >manager
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td> <input type="file" name="image"> 
                            </td>
                        </tr>
                        <td>
                        <td>
                            <button>Submit</button>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php 
            if(!empty($_POST)){
                $id = $_POST['id'];
                $fname = $_POST['first_name'];
                $lname = $_POST['last_name'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $country = $_POST['country'];
                $role = $_POST['role'];
                if(!empty($_FILES['image']['name'])){
                    $image=$_FILES['image']['name'];
                    $tmp=$_FILES['image']['tmp_name'];
                    $path='uploads/';
                    move_uploaded_file($tmp,$path.$image);
                }else {
                    // If no new image is uploaded, keep the existing image name
                    $id=  $_GET["id"];
                    $sql_img = "SELECT image FROM student WHERE id='$id'";
                    $result_img = mysqli_query($connection, $sql_img);
                    $row_img = mysqli_fetch_assoc($result_img);
                    $image = $row_img['image'];
                } 
                $query = "UPDATE student SET first_name = '$fname',last_name='$lname',age=$age,gender='$gender',
                country='$country',role='$role',image='$image' WHERE id = $id";
                $result = $connection->query($query);
                if ($result) {
                    echo ("Data Updated Successfully <br>");
                    echo '<a href="users.php">Go back to table</a>';
                } else {
                    echo ("Data Update Failed");
                }
        
            }
    ?>
                </div>
                <div class="col-4">
                <img width="320px" height="300px" src="uploads/<?=$row['image']?>">
                
                </div>
            </div>
        </form>
    </div>




   
</body>

</html>