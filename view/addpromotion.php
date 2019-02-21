<?php 

session_start();

// require_once "../controller/admin_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/admin.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/login.css" />
    <title>➕Add Promotion</title>
  </head>
  <body>
    <div id="page">
      <header>
        <div class="logo">
          <h1><a href="../view/index.php">Berwyn Buses Hire</a></h1>
          <span id="movilBasket"></span>
          <div id="line1"></div>
          <div id="line2"></div>
        </div>
        <?php if($_SESSION["isLogged"]): ?>
        <nav>
          <ul>
            <li><a href="../controller/admin_logout.php">Logout</a></li>
            <li><a href="../view/admin_view.php"><?= $_SESSION["username"]?></a></li>
          </ul>
        </nav>
        <?php endif; ?>
      </header>
      <section class="main-section">
        <article class="book-coach">
          <?php if(!$_SESSION["isLogged"]): ?>
          <div class="book-coach-header">
            <h2><a href="../view/admin_view.php">OOPS Login!</a></h2>
          </div>
          <?php else: ?>
          <div class="book-coach-header">
            <h2>Add Promotion</h2>
            <form action="">
                <input type="text" placeholder="Promotion ID">
                <input type="text" placeholder="Promotion Descripton">
                <span>
                <input type="number" placeholder="Discount Amount"/>
              </span>
                <div class="admin-buttons">
              <a href="#">Add</a>
            </div>
            </form>
            <!-- UPLOAD FILE TO SERVER -->
            <!--<form action="../view/submit.php" id="formulario">
              <input style="width: 300px; border: none" type="file" name="file" id="file"><br>
              <button type="submit">Upload</button>
            </form>
            <div id="progress"></div> -->
            <!-- UPLOAD FILE TO SERVER -->

          </div>
          <?php endif ?>
        </article>
      </section>

    <?php
      require_once "footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/admin.js"></script>
    <!-- UPLOAD FILE TO SERVER -->
    <script>
      /*var forma = document.getElementById("formulario");
      var elfile = document.getElementById("file");

      var request = new XMLHttpRequest();

      request.upload.addEventListener("progress", function(e){
        document.querySelector("#progress").innerHTML = Math.round(e.loaded/e.total * 100) + "%";
      }, false);

      forma.addEventListener("submit", function(e){
        e.preventDefault();

        var formData = new FormData();
        formData.append("file", elfile.files[0]);

        request.open("post", "../view/submit.php");
        request.send(formData);

      }, false);*/
    </script>
    <!-- UPLOAD FILE TO SERVER -->
  </body>
</html>
