
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Circuit Cuture</title>
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
    <a href="cart.html" class="cart-icon"  style="float:right">
    <i class="fa fa-shopping-cart" ></i>
    <icon-icon name="basket"></icon-icon><span class="cart-count">0</span>
    </a>
  </div>

  <div class="row">
    <div class="leftcolumn">
      <div class="card">
        <h2>Shop</h2>
        <h5>Produse disponibile</h5>
        <img src="https://fueler.store/cdn/shop/articles/Talabat_Banner_1_1000x.jpg?v=1696346112">
        <p>Descopera noile produse marca Formula 1</p>
      </div>

      <div class="card">
        <img src="https://motorsport.nda.ac.uk/wp-content/uploads/2020/09/red-bull-f1-sponsors-2019.jpg">
        <p></p>
      </div>

      <div class="card">
        <img src="https://creativereview.imgix.net/content/uploads/2017/11/F1-logo-red-on-white.png?auto=compress,format&q=60&w=1200&h=750">
        <p></p>
      </div>
    </div>

    <div class="rightcolumn">
      <div class="card">
        <h2>Despre Noi</h2>
        <p>Bun venit la Circuit Cuture, magazinul tău online dedicat pasionaților de Formula 1. Oferim cele mai noi produse, știri și evenimente legate de lumea motorsportului.</p>
      </div>

      <div class="card">
        <h2>Contact</h2>
        <p>Pentru orice întrebări sau asistență, nu ezitați să ne contactați la adresa de email: contact@circuitcuture.com</p>
      </div>

      
    </div>
  </div>
  <div class="footer">
    <p>&copy; 2023 Circuit Cuture.</p>
  </div>

<script src="main.js"></script>

</body>
</html>
