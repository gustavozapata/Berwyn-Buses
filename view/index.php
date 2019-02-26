<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once "../includes/head.php"; ?>
<title>🚎 Home Page</title>
  </head>
  <body>
    <div id="page">
      <?php
      require_once "../includes/header.php";

      ?>
      <section class="main-section">
        <article class="book-coach">
          <div class="book-coach-header">
            <h2>Book🚍Coach</h2>
            <div id="line3"></div>
            <div id="line4"></div>
          </div>
          <div>
            <form action="../controller/search_controller.php">
              <span>
                <p>Depart</p>
                <input id="from" type="text" name="depart"/>
              </span>
              <span>
                <p>Return</p>
                <input id="to" type="text" name="return" />
              </span>
              <span>
                <p>Passengers</p>
                <input id="passengers" name="passengers" type="number" maxlength="3" required/>
              </span>
              <span id="warning">Status</span>
              <br />
              <input
                id="requireDriver"
                type="checkbox"
                name="requireDriver"
              /><label for="requireDriver">Require a driver</label><br />
              <input type="submit" value="Search" />
            </form>
          </div>
        </article>
      </section>

    <?php
      require_once "../includes/footer.php";
    ?>

    </div>
    <!-- PAGE -->
    <script src="../scripts/bookingSearch.js"></script>
    <script src="../scripts/index.js"></script>
  </body>
</html>
