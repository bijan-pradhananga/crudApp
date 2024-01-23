<?php
    require_once('database.php');
    require_once('header.php');

    
    if ($_SESSION['role'] != "admin") {
        $_SESSION['error'] = "Must be admin";
        echo '<script>alert("' . $_SESSION['error'] . '");</script>';
        header("location: welcome.php");
    }
    

    // for pagination
    $pageSql = "SELECT * FROM student";
    $pResponse = mysqli_query($connection, $pageSql);
    $total = mysqli_num_rows($pResponse);
    $offset = 0;
    $limit = 5;
    $page = ceil($total / $limit);
    if (!empty($_GET['page'])) {
        $pp = $_GET['page'];
        $offset = ($pp - 1) * $limit;
    }

// show the table by order
    if(isset($_GET['order'])){
        $order = $_GET['order'];
        $field = $_GET['field'];
        $query = "SELECT * FROM student ORDER BY $field $order LIMIT $offset,$limit";
        $result = mysqli_query($connection,$query);
        }
    else{
        $selectSql = "SELECT * FROM student ORDER BY id LIMIT $offset,$limit";
        $result = mysqli_query($connection, $selectSql);
    }

//for delete
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $image = $_GET['image'];
        $dquery = "DELETE FROM student WHERE id = '$id'";
        $dResult = mysqli_query($connection,$dquery); 
        if($dResult){
                unlink("uploads/" . $image);
                echo "Data Deleted Successfully";
                header("Location:users.php");

        }else{
            echo "Data Deletion Failed";
        }
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
    <script src="https://kit.fontawesome.com/c85c5e1d0c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-xxl">
    <h1>Users Table</h1>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">id</th>
            <th scope="col">first name &nbsp; <a href="users.php?order=asc&field=first_name" id="sortAsc">
                    <i class="fa-solid fa-sort-up"></i>
                </a>
                <a href="users.php?order=desc&field=first_name" id="sortDesc">
                    <i class="fa-solid fa-sort-down"></i>
                </a>
            </th>
            <th scope="col">last name</th>
            <th scope="col">age</th>
            <th scope="col">gender</th>
            <th scope="col">country</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
            <th scope="col">image</th>
            <th scope="col">action</th>
        </tr>
    </thead>


    <tbody>
        <?php 

    while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td>
                <?php echo $row['id'] ?>
            </td>
            <td>
                <?php echo $row['first_name'] ?> 
            </td>
            <td>
                <?php echo $row['last_name'] ?>
            </td>
            <td>
                <?php echo $row['age'] ?>
            </td>
            <td>
                <?php echo $row['gender'] ?>
            </td>
            <td>
                <?php echo $row['country'] ?>
            </td>
            <td>
                <?php echo $row['email'] ?>
            </td>
            <td>
                <?php echo $row['role'] ?>
            </td>
            <td><img src="uploads/<?php echo $row['image'] ?>" alt="image" width="50px" height="50px"></td>
            <td>
                <a onclick="return confirm('Are you sure to delete?')"
                    href="users.php?id=<?=$row['id']?>&image=<?=$row['image']?>" class="btn btn-danger"><i
                        class="bi bi-trash3"></i></a>
                <a href="edit.php?id=<?=$row['id']?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
            </td>
        </tr>
        <?php        
            }
        ?>
    </tbody>
</table>
    </div>
    
    <div style="display:flex; justify-content: center;">
        <ul style="display:flex; justify-content: center;">

            <?php for ($i = 1; $i <=$page; $i++) : ?>
            <li><a href="?page=<?=$i?>">
                    <?= $i; ?>
                </a> &nbsp;</li>
            <?php endfor; ?>

        </ul>
    </div>

</body>

</html>