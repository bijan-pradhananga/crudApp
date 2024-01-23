<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">LOGO</label>
      <ul>
        <li><a  href="welcome.php">Home</a></li>
        <?php 
  session_start();
  if ($_SESSION['role'] == "admin") {
    echo "<li><a href=\"addUser.php\">Add User</a></li>
    <li><a href=\"users.php\">User Table</a></li>";
  } else if ($_SESSION['role'] == "manager") {
    echo "<li><a href=\"addUser.php\">Add User</a></li>";
  }
?>

        <li><a href="search.php">search</a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </nav>
 
  </body>
</html>