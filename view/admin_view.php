<?php 

// session_start();

require_once "../controller/admin_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/admin.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <title>Admin Page</title>
  </head>
  <body>
    <div id="page">
      <header>
        <div class="logo">
          <h1><a href="../view/admin_view.php">Berwyn Buses Hire</a></h1>
          <span id="movilBasket"></span>
          <div id="line1"></div>
          <div id="line2"></div>
        </div>
        <?php if($_SESSION["isLogged"]): ?>
        <nav>
          <ul>
            <li><a href="../controller/admin_logout.php">Logout</a></li>
            <li><a href="../view/admin_view.php"><?= $_SESSION["username"]?></a></li>
          </ul>
        </nav>
        <?php endif; ?>
      </header>
      <section class="main-section">
        <article class="book-coach">
          <?php if(!$_SESSION["isLogged"]): ?>
          <div class="book-coach-header">
            <h2>Admin Login</h2>
            <?php if(isset($_REQUEST["username"])): ?>
            <p id="loginStatus">Username or password incorrect</p>
            <?php endif; ?>
          </div>
          <div>
            <form action="../controller/admin_controller.php" method="post">
              <span>
                <p>Username</p>
                <input type="name" name="username" required/>
              </span><br>
              <span>
                <p>Password</p>
                <input type="password" name="password" required/>
              </span>
              <br />
              <input type="submit" value="Login" />
            </form>
          </div>
          <?php else: ?>
          <div class="book-coach-header">
            <h2>Coaches</h2>
            <div class="admin-buttons">
              <a href="../view/addcoach.php">Add coach</a>
              <a href="#">Edit coach</a>
            </div>

            <h2>Promotions</h2>
            <div class="admin-buttons">
              <a href="../view/addpromotion.php">Add promotion</a>
              <a href="#">Edit promotion</a>
            </div>

          </div>
          <?php endif ?>
        </article>
      </section>

    <?php
      require_once "../includes/footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/admin.js"></script>
  </body>
</html>
