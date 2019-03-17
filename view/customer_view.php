<?php 

require_once "../controller/customer_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <title>User Page</title>
  </head>
  <body>
    <div id="page">
      <?php
      require_once "../includes/header.php";
      ?>
      <section class="main-section">
        <article class="book-coach">
          <?php if(!$_SESSION["userLogged"]): ?>
          <div class="book-coach-header">
            <h2>User Login</h2>
            <?php if(isset($_REQUEST["email"])): ?>
            <p id="loginStatus">Username or password incorrect</p>
            <?php endif; ?>
          </div>
          <div>
            <form method="post" action="../controller/customer_controller.php">
              <span>
                <p>Email</p>
                <input type="name" name="email" required/>
              </span><br>
              <span>
                <p>Password</p>
                <input type="password" name="password" required/>
              </span>
              <br />
              <input type="submit" value="Login" />
            </form>
            <p>Don't have an account?</p>
            <p><a href="#">Sign-up</a></p>
          </div>
          <?php else: ?>
          <div class="book-coach-header">
            <h2>Welcome <?= $_SESSION["username"] ?></h2>
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
  </body>
</html>
