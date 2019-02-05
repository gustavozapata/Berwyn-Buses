<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="../content/css/styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>🚎 Home Page</title>
  </head>
  <body>
    <div id="page">
      <?php
      require_once "./header.php";
      ?>

      <article class="main-article">
        <section class="book-coach">
          <div class="book-coach-header">
            <h2>Book🚍Coach</h2>
            <div id="line3"></div>
            <div id="line4"></div>
          </div>
          <div>
            <form action="./search.php">
              <span>
                <p>Depart</p>
                <input type="date" name="depart" />
              </span>
              <span>
                <p>Return</p>
                <input type="date" name="return" />
              </span>
              <span>
                <p>Passengers</p>
                <input name="passengers" /> </span
              ><br />
              <input
                id="requireDriver"
                type="checkbox"
                name="requireDriver"
              /><label for="requireDriver">Require a driver</label><br />
              <input type="submit" value="Search" />
            </form>
          </div>
        </section>
      </article>

      <footer>
        <p><a href="#">Design and Developed by A14</a></p>
      </footer>
      <div class="contact">
        <p>Contact Us</p>
        <img src="../content/images/chat.png" />
      </div>
    </div>
    <!-- PAGE -->
    <script src="../scripts/index.js"></script>
  </body>
</html>
