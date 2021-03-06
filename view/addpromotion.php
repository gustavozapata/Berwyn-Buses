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
    <link rel="stylesheet" type="text/css" href="../content/css/promotion.css" />
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
            <form action="../controller/promo_controller.php" method="post">
                <textarea maxlength="100" name="promoDescription" placeholder="Promotion Descripton" required></textarea>
                <input type="number" name="promoAmount" placeholder="Discount Amount (%)" required/>
                <input name="promoCode" placeholder="Promotion Code" required>
                <input id="expiry" name="promoExpiry" placeholder="Expiry Date" required/>
                <div class="admin-buttons">
                  <input id="addPromoBtn" type="submit" value="Add">
                </div>
            </form>

          </div>
          <?php endif ?>
        </article>
      </section>

      <?php if(isset($_REQUEST["promoAmount"])): ?>
      <div class="coachAddedBg">
        <div class="coachAddedPopup">
            <img src="../content/images/tick.png" alt="Tick Image">
            <p>The promotion has been added</p>
            <a href="../view/addpromotion.php">OK</a>
        </div>
      </div>
      <?php endif; ?>

    <?php
      require_once "../includes/footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/bookingSearch.js"></script>
    <script src="../scripts/index.js"></script>
    <script src="../scripts/admin.js"></script>
    <script src="../scripts/promotions.js"></script>
  </body>
</html>
