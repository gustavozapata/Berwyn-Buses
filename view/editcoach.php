<?php 

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";
require_once "../model/VehicleType.php";

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
  $coaches = DataAccess::getInstance()->searchCoaches(74,0,0);
  $coachTypes = DataAccess::getInstance()->getVehicleTypes();
} else {
  $_SESSION["adminLogged"] = false;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/editcoach.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/admin.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <title>🔧Edit Coaches</title>
  </head>
  <body>
    <div id="page">
      <?php require_once "../includes/admin_header.php" ?>
      <section class="main-section">
        <article class="book-coach">
          <div class="book-coach-header">
          <?php if(!$_SESSION["adminLogged"]): ?>
            <h2><a href="../view/admin_view.php">OOPS Login!</a></h2>
          <?php else: ?>
            <h2>Edit Coaches</h2>
            </div>
            <div class="edit-coaches">
              <table>
              <tr>
                <th>ID</th>
                <th>Reg. Number</th>
                <th>Type</th>
                <th>Make</th>
                <th>Colour</th>
                <th>Max. Capacity</th>
                <th>Daily Rate</th>
              </tr>
              <?php foreach($coaches as $coach): ?>
              <tr>
                <td><?= $coach->id ?></td>
                <td><?= $coach->registrationNumber ?></td>
                <td><?= $coach->type ?></td>
                <td><?= $coach->make ?></td>
                <td><?= $coach->colour ?></td>
                <td><?= $coach->maxCapacity ?></td>
                <td>£<?= $coach->hourlyRate ?></td>
                <td><img src="../content/images/edit.png" alt="Edit Pencil"></td>
              </tr>
              <?php endforeach; ?>
              </table>
            </div>
          <?php endif ?>
        </article>
      </section>

      <!-- EDIT COACH POPUP -->
      <div id="editBg">
        <div id="editPopup">
          <img src="../content/images/close.png" alt="Close Button">
          <h2>Coach &#35;<span></span></h2>
          <table>
            <tr>
              <td>Reg. Number:</td>
              <td><input type="text" name="editReg"></td>
            </tr>
            <tr>
              <td>Type:</td>
              <td>
                <select name="editType">
                  <?php foreach($coachTypes as $coachType): ?>
                  <option value="<?= $coachType->type ?>"><?= $coachType->type ?></option>
                  <?php endforeach; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Make:</td>
              <td><input type="text" name="editMake"></td>
            </tr>
            <tr>
              <td>Colour:</td>
              <td><input type="text" name="editColour"></td>
            </tr>
            <tr>
              <td>Max. Capacity:</td>
              <td><input type="number" name="editCapacity"></td>
            </tr>
            <tr>
              <td>Daily Rate:</td>
              <td><input type="number" name="editDaily"></td>
            </tr>
          </table>
          <div class="save-btn admin-buttons">
            <a id="saveEditCoach">Save</a>
          </div>
        </div>
      </div>
      <!-- END EDIT COACH POPUP -->
      

    <?php
      require_once "../includes/footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/admin.js"></script>
    <script src="../scripts/editcoach.js"></script>
  </body>
</html>
