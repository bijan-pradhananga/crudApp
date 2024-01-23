<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once('database.php');
    require_once('header.php');

   
    if(!$_SESSION['auth']){
        header("location:login.php");
    }


?>
    <div style=" text-align: center; color:#9b59b6;" >
        <h1> 
        <?php 
           echo "Welcome {$_SESSION['first_name']} {$_SESSION['last_name']} ({$_SESSION['role']})"; ;
        ?>
        </h1>
    </div>

    

</body>
</html>
