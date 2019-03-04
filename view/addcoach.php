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
            <form action="">
                <input type="text" placeholder="Reg. Number">
                <div class="admin-buttons">
              <a href="../view/admin_view.php">Add</a>
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
      require_once "../includes/footer.php";
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
