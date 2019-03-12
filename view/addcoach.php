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
              <input name="regNumber" placeholder="Reg. Number"><br>
              <select name="addType">
                <option disabled selected value>Select a vehicle type</option>
                <?php foreach($coachTypes as $coachType): ?>
                <option value="<?= $coachType->type ?>"><?= $coachType->type ?></option>
                <?php endforeach; ?>
              </select><br>
              <input name="make" placeholder="Make">
              <input name="colour" placeholder="Colour">
              <div class="admin-buttons">
                <input id="addCoachBtn" type="submit" value="Add">
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
