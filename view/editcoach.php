<?php 

session_start();

// require_once "../controller/admin_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/admin.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <title>🔧Edit Coaches</title>
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
            <h2><a href="../view/admin_view.php">OOPS Login!</a></h2>
          </div>
          <?php else: ?>
          <div class="book-coach-header">
            <h2>Edit Coaches</h2>
            <form action="">

                <div class="admin-buttons">
              <a href="../view/admin_view.php">Save Changes</a>
            </div>
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
    <script src="../scripts/admin.js"></script>
  </body>
</html>