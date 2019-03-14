<?php 

session_start();

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
} else {
  $_SESSION["adminLogged"] = false;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/admin.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/addcoach.css" />
    <title>➕Add Promotion</title>
  </head>
  <body>
    <div id="page">
    <?php require_once "../includes/admin_header.php" ?>
      <section class="main-section">
        <article class="book-coach">
          <?php if(!$_SESSION["adminLogged"]): ?>
          <div class="book-coach-header">
            <h2><a href="../view/admin_view.php">OOPS Login!</a></h2>
          </div>
          <?php else: ?>
          <div class="book-coach-header">
            <h2>Add Promotion</h2>
            <form action="">
                <input type="text" placeholder="Promotion Descripton" required>
                <input type="number" placeholder="Discount Amount" required/>
                <input type="text" placeholder="Promotion Code" required>
                <input id="expiery" type="text" placeholder="Expiry Date" required/>
                <div class="admin-buttons">
              <a href="../view/admin_view.php">Add</a>
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
    <script src="../scripts/bookingSearch.js"></script>
  </body>
</html>
