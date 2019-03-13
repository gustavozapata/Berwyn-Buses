<?php 

session_start();

require_once "../model/DataAccess.php";
require_once "../model/VehicleType.php";

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
  $coachTypes = DataAccess::getInstance()->getVehicleTypes();
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
    <title>➕Add Coach</title>
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
            <h2>Add Coach</h2>
            <form action="../controller/addcoach_controller.php" method="post">
              <input name="regNumber" placeholder="Reg. Number" required><br>
              <select name="addType" required>
                <option disabled selected value>Select a vehicle type</option>
                <?php foreach($coachTypes as $coachType): ?>
                <option value="<?= $coachType->id ?>"><?= $coachType->type ?></option>
                <?php endforeach; ?>
              </select><br>
              <input name="make" placeholder="Make" required>
              <input name="colour" placeholder="Colour" required>
              <div class="admin-buttons">
                <input id="addCoachBtn" type="submit" value="Add">
              </div>
            </form>

          </div>
          <?php endif ?>
        </article>
      </section>

      <?php if(isset($_REQUEST["addType"])): ?>
      <div id="coachAddedBg">
        <div id="coachAddedPopup">
            <img src="../content/images/tick.png" alt="Tick Image">
            <p>The coach has been added</p>
            <p>Would you like to notify customers and visitors?</p>
            <a id="notifyCustomerBtn">Yes</a><a href="../view/addcoach.php">No</a>
        </div>
      </div>
      <?php endif; ?>

    <?php
      require_once "../includes/footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/admin.js"></script>
    <script src="../scripts/addcoach.js"></script>
  </body>
</html>
