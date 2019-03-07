<?php 

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
  $coaches = DataAccess::getInstance()->searchCoaches(74,0,0);
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
                <td><?= $coach->hourlyRate ?></td>
                <td><img src="../content/images/edit.png" alt="Edit Pencil"></td>
              </tr>
              <?php endforeach; ?>
              </table>
            </div>
      
            <div class="admin-buttons">
              <a href="#">Save Changes</a>
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
