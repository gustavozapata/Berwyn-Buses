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
    <link rel="stylesheet" type="text/css" href="../content/css/editcoach.css" />
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
                <th>Promo Code</th>
                <th>Expiry</th>
              </tr>
              <tr>
                <td>1</td>
                <td data-edit="reg">25% Off</td>
                <td data-edit="make">KU19PHP</td>
                <td data-edit="colour">March 25, 2019</td>
                <td><img src="../content/images/edit.png" alt="Edit Pencil"></td>
              </tr>
              </table>
            </div>
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
