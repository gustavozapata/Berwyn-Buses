<!DOCTYPE html>
<html>
<head>
<?php require_once "./head.php"; ?>
        <title>About Us</title>
        </head>
        <style>
    #Gpiece {
      width: 500px;
      border-radius:50%;
    }
      .borderabout{
      display: inline-block;
      width: 400px;
      height: 280px;
      margin: 10px 15px;
      padding: 10px;
      text-align: center;
      border: 2px solid rgb(230, 230, 230);
      border-radius: 20px;
  /* box-shadow: 0 0 5px rgb(200, 200, 200); */
    }
    </style>
    <body>
    <div id="page">
      <?php
      require_once "./header.php";
      ?>

        <h1 align = "center"> About Us </h1>

        <p class="borderabout"> We are dedicated to providing a premium service to all our customers, <br>
            we work with all kinds of organisations including business or educational, we also have our serivces available to indviduals. </br>
            There are a variety of high class vehicles that are avalible to hire from, with a wide range of capacities and the additional </br>
            optional of hiring a professional driver to get you from point A to point B.<br>
            The vehicles come in a veriety or size ranging from a small seven seaters to a large 150 seat double decker bus. </br>
        </p>
        <img id = "Gpiece" src = "../content/images/gamepiece.jpeg"/>

        <h2 align = "center"> The Team</h2>
        <p align = "center">
            This website was created for a university project, the group behind this project is A14 PATMAN.  
        </p>


        <footer>
        <p><a href="#">Design and Developed by A14</a></p>
      </footer>
      <div class="contact">
        <p>Contact Us</p>
        <img src="../content/images/chat.png" />
      </div>
    </div>
    <!-- PAGE -->
    <script src="./scripts/index.js"></script>
    </body>
</html>