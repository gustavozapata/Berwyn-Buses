<?php 

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Promotion.php";

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
  $promotions = DataAccess::getInstance()->getPromotions();
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
    <link rel="stylesheet" type="text/css" href="../content/css/editcoach.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/promotion.css" />
    <title>➕Edit Promotion</title>
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
            <h2>Edit Promotion</h2>
            <div class="edit-coaches">
              <table>
              <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Code</th>
                <th>Expiry</th>
              </tr>
              <?php foreach($promotions as $promotion): ?>
              <tr id="<?= $promotion->id ?>">
                <td><?= $promotion->id ?></td>
                <td data-edit="description"><?= $promotion->description ?></td>
                <td data-edit="amount"><?= $promotion->amount ?></td>
                <td data-edit="code"><?= $promotion->code ?></td>
                <td data-edit="expiry"><?= date('d/m/Y', strtotime($promotion->expiry)) ?></td>
                <td><img src="../content/images/edit.png" alt="Edit Pencil"></td>
              </tr>
              <?php endforeach; ?>
              </table>
            </div>
          </div>
          <?php endif ?>
        </article>
      </section>

      <!-- EDIT PROMOTION POPUP -->
      <div id="editBg">
        <div id="editPopup">
          <img src="../content/images/close.png" alt="Close Button">
          <h2>Promotion &#35;<span></span></h2>
          <table>
            <tr>
              <td>Description:</td>
              <td><textarea name="editDescription" maxlength="100"></textarea></td>
            </tr>
            <tr>
              <td>Amount:</td>
              <td><input type="text" name="editAmount"></td>
            </tr>
            <tr>
              <td>Code:</td>
              <td><input type="text" name="editCode"></td>
            </tr>
            <tr>
              <td>Expiry:</td>
              <td><input id="expiry" type="text" name="editExpiry"></td>
            </tr>
          </table>
          <div class="save-btn admin-buttons">
            <a id="saveEditCoach">Save</a>
          </div>
        </div>
      </div>
      <!-- END EDIT PROMOTION POPUP -->

    <?php
      require_once "../includes/footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/admin.js"></script>
    <script src="../scripts/promotions.js"></script>
    <script src="../scripts/bookingSearch.js"></script>
  </body>
</html>
