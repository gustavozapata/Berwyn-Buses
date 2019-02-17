<?php 

// session_start();

require_once "../controller/admin_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/admin.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <title>Admin Page</title>
  </head>
  <body>
    <div id="page">
      <header>
        <div class="logo">
          <h1><a href="../view/index.php">Berwyn Buses Hire</a></h1>
          <span id="movilBasket"></span>
          <div id="line1"></div>
          <div id="line2"></div>
        </div>
        <?php if($isLogged): ?>
        <nav>
          <ul>
            <li><a href="../view/admin_view.php">Logout</a></li>
          </ul>
        </nav>
        <?php endif; ?>
      </header>
      <section class="main-section">
        <article class="book-coach">
          <?php if(!$isLogged): ?>
          <div class="book-coach-header">
            <h2>Admin Login</h2>
            <?php if(isset($_REQUEST["username"])): ?>
            <p id="loginStatus">Username or password incorrect</p>
            <?php endif; ?>
          </div>
          <div>
            <form action="../controller/admin_controller.php">
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
            <h3>Welcome <?= $admin[0]->givenName ?></h3>
          </div>
          <div>
            <form action="../controller/search_controller.php">
            </form>
          </div>
          <?php endif ?>
        </article>
      </section>

    <?php
      require_once "footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/admin.js"></script>
  </body>
</html>
