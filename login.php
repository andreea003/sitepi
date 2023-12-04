
<?php
require 'config.php';
// if(!empty($_SESSION["id"])){
//   header("Location: index.php");
// }
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user1 WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }

  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Login</title>
</head>

<body>
    <div class="header">
        <h1>CIRCUIT CUTURE</h1>
        <p>Un magazin cu tematica Formula 1</p>
    </div>

    <div class="navbar">
        <a href="index.php">Home</a>

        <div class="dropdown">
            <button class="dropbtn">Contul tau
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="login.php">Login</a>
                <a href="logout.php">Logout</a>
                <a href="registration.php">Register</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Meniu
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="formula1.html">Formula1</a>
                <a href="shop.html">Shop</a>
                <a href="cart.html">Cos de cumparaturi</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="center">
            <form action="" method="post" autocomplete="off">
                <label for="usernameemail">Username or Email:</label>
                <input type="text" name="usernameemail" id="usernameemail" required value=""> <br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required value=""> <br>
                <button type="submit" name="submit" class="button">Login</button>
            </form>
            <br>
            <a href="registration.php" class="button">Registration</a>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
