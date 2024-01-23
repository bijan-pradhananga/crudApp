<?php
    require_once('database.php');
    require_once('header.php');
    
    if(!$_SESSION['auth']){
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <title>Search</title>
</head>

<body>


    <div class="container-xxl">
        <div class="row">
            <h1>Search</h1>
        </div>
        <div class="row mb-3">
            <form action="" method="GET">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="text" name="search"
                            value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>"
                            placeholder="Enter name to search" id="form1" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">age</th>
                    <th scope="col">gender</th>
                    <th scope="col">country</th>
                    <th scope="col">email</th>
                    <th scope="col">image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['search'])){
                    $searchValue = $_GET['search'];
                    $sQuery = "SELECT * FROM student WHERE CONCAT(first_name,last_name) LIKE '%$searchValue%'";
                    $result = mysqli_query($connection,$sQuery);
                    $row = mysqli_fetch_assoc($result);
                    $findData = mysqli_num_rows($result);
                    if($findData>0){
                        echo "
                                <tr>
                                        <td scope='col'>{$row['id']}</td>
                                        <td scope='col'>{$row['first_name']}</td>
                                        <td scope='col'>{$row['last_name']}</td>
                                        <td scope='col'>{$row['age']}</td>
                                        <td scope='col'>{$row['gender']}</td>
                                        <td scope='col'>{$row['country']}</td>
                                        <td scope='col'>{$row['email']}</td>
                                        <td scope='col'><img src='uploads/{$row['image']}' alt='image' width='50px' height='50px'></td>
                                </tr>
                             ";
                            }
                    else{
                        echo "<h2>not found</h2>";
                    }
                } 
        ?>

            </tbody>
        </table>
    </div>





</body>

</html>