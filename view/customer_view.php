<?php 

require_once "../controller/customer_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/signup.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/addcoach.css" />
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
            <div class="no-account">
              <p>Don't have an account?</p>
              <p><a href="#" id="signupBtn">Sign-up</a></p>
            </div>
          </div>
          <?php else: ?>
          <div class="book-coach-header">
            <h2>Welcome <?= $_SESSION["givenName"] ?></h2>
            <p>Are you planning to go somewhere this coming weekend?</p>
            <p>🔍 <a href="../view/index.php">Search for coaches</a> 🚍</p>
          </div>
          <?php endif ?>
        </article>
      </section>

      <div class="signupBg">
        <div class="signupPopup checkout-payment">
          <img src="../content/images/close.png" alt="Close Button">
          <h3>Sign up</h3>
          <form method="post" action="../controller/checkout_controller.php">
            <?php require_once "../view/signup.php"; ?>
            <input type="hidden" name="fromLogin">
            <input type="submit" value="Sign-up">
          </form>
        </div>
      </div>

      <?php if(isset($_SESSION["accountCreated"]) && $_SESSION["accountCreated"]): ?>
      <div class="coachAddedBg">
        <div class="coachAddedPopup">
            <img src="../content/images/tick.png" alt="Tick Image">
            <p>The account has been created</p>
            <a class="account-created" href="#">OK</a>
        </div>
      </div>
      <?php endif; ?>

    <?php
      require_once "../includes/footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
  </body>
</html>
