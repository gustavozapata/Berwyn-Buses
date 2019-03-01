<!-- +we should return JSON and/or Plain text from our Ajax calls for the assignment -->
<?php

require_once "../controller/checkout_test_controller.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/checkout_test.css" />
    <title>Checkout</title>
</head>
<body>
    <div id="page">
      <?php require_once "../includes/header.php"; ?>


    <section class="main-section">
        <article class="book-coach">
          <div class="book-coach-header">
            <h2>Check-out<span class="basketItems"><?= $_SESSION["basketItems"] ?></span></h2>
            <div id="line3"></div>
            <div id="line4"></div>
          </div>
          <div>
        </article>
    </section>
    <?php require_once "../includes/footer.php"; ?>

    </div><!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/checkout_test.js"></script>
</body>
</html>