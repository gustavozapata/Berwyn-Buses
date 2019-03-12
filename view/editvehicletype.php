<?php 

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";
require_once "../model/VehicleType.php";

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
  $vehicleTypes = DataAccess::getInstance()->getVehicleTypes();
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
    <title>🔧Edit Vehicle Types</title>
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
            <h2>Edit Vehicle Types</h2>
            </div>
            <div class="edit-coaches">
              <table>
              <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Max. Capacity</th>
                <th>Daily Rate</th>
              </tr>
              <?php foreach($vehicleTypes as $vehicleType): ?>
              <tr id="<?= $vehicleType->id ?>">
                <td><?= $vehicleType->id ?></td>
                <td data-edit="type"><?= $vehicleType->type ?></td>
                <td data-edit="max"><?= $vehicleType->maxCapacity ?></td>
                <td data-edit="rate">£<?= $vehicleType->hourlyRate ?></td>
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
              <td>Type:</td>
              <td>
                <select name="editType">
                  <option value="VIP Coach">VIP Coach</option>
                  <option value="Standard Minibus">Standard Minibus</option>
                  <option value="Standard MPV">Standard MPV</option>
                  <option value="Executive MPV">Executive MPV</option>
                  <option value="Standard Coach">Standard Coach</option>
                  <option value="Double Deck Coach">Double Deck Coach</option>
                  <option value="Bus">Bus</option>
                  <option value="Executive Mini Coach">Executive Mini Coach</option>
                </select>
              </td>
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
            <a id="saveEditVehicle">Save</a>
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
    <script src="../scripts/editvehicletype.js"></script>
  </body>
</html>
