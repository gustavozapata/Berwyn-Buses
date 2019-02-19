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
          <?php if(!$isLogged): ?>
          <div class="book-coach-header">
            <h2>User Login</h2>
            <?php if(isset($_REQUEST["email"])): ?>
            <p id="loginStatus">Username or password incorrect</p>
            <?php endif; ?>
          </div>
          <div>
            <form action="../controller/customer_controller.php">
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
          </div>
          <?php else: ?>
          <div class="book-coach-header">
            <h2>Welcome <?= $user[0]->givenName ?></h2>
          </div>
          <div>
            <form action="../controller/search_controller.php">
            </form>
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
    <script>
    var logged = "<?php if($isLogged) echo true; else echo false; ?>";
    if(logged){
      $("header nav ul li").eq(2).find("a").text("Logout");
    }
    </script>
  </body>
</html>
