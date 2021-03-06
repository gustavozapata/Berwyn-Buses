<?php 

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";
require_once "../model/VehicleType.php";

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
  $coaches = DataAccess::getInstance()->searchCoaches(74,0,0,0);
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
                <th>Make</th>
                <th>Colour</th>
              </tr>
              <?php foreach($coaches as $coach): ?>
              <tr id="<?= $coach->id ?>">
                <td><?= $coach->id ?></td>
                <td data-edit="reg"><?= $coach->registrationNumber ?></td>
                <td data-edit="make"><?= $coach->make ?></td>
                <td data-edit="colour"><?= $coach->colour ?></td>
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
              <td>Make:</td>
              <td><input type="text" name="editMake"></td>
            </tr>
            <tr>
              <td>Colour:</td>
              <td><input type="text" name="editColour"></td>
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
