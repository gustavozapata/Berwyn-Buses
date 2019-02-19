<!DOCTYPE html>
<html>
<head>
<?php require_once "../includes/head.php"; ?>
        <title>About Us</title>
        </head>
        <style>
    #Gpiece {
      width: 500px;
      border-radius:50%;
      margin-left: 50px;
      
    }
      .borderabout{
      display: inline-block;
      width: 400px;
      height: 300px;
      margin: 10px 15px;
      padding: 10px;
      text-align: center;
      border: 2px solid rgb(230, 230, 230);
      border-radius: 20px;
      position: relative;
      top: -50px
    }
      .about{
      text-align: center;
      padding: 20pxjh drbvc;
      padding: 20px;
      position: relative; 
      }
    }

    </style>
    <body>
    <div id="page">
      <?php
      require_once "../includes/header.php";
      ?>

        <h1 align = "center"> About Us </h1>

        <div class = "about">
           <p class="borderabout"> We are dedicated to providing a premium service to all our customers, <br>
            we work with all kinds of organisations including business or educational, we also have our serivces available to indviduals. </br>
            There are a variety of high class vehicles that are avalible to hire from, with a wide range of capacities and the additional </br>
            optional of hiring a professional driver to get you from point A to point B.<br>
            The vehicles come in a veriety or size ranging from a small seven seaters to a large 150 seat double decker bus. </br>
        </p>
        <img id = "Gpiece" src = "../content/images/gamepiece.jpeg"/>
        </div>
        <?php
      require_once "../includes/footer.php";
    ?>
    </div>
    <!-- PAGE -->
    <script src="../scripts/bookingSearch.js"></script>
    <script src="../scripts/index.js"></script>
  </body>
</html>