<?php
require 'config.php';
// if(!empty($_SESSION["id"])){
//   header("Location: index.php");
// }
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user1 WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user1 VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Registration</title>
</head>

<body>
    <div class="header">
        <h1>CIRCUIT CULTURE</h1>
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
        <div class="center form-container">
            <form action="" method="post" autocomplete="off">
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" required value=""> <br>

                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required value=""> <br>

                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required value=""> <br>

                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required value=""> <br>

                <label for="confirmpassword">Confirm Password :</label>
                <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>

                <button type="submit" name="submit">Register</button>
                
            </form>
            <a href="login.php">Login</a>
        </div>
    </div>

</body>

</html>
