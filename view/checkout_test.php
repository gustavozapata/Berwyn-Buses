<!-- +we should return JSON and/or Plain text from our Ajax calls for the assignment -->
<?php

require_once "../controller/checkout_test_controller.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
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
        <article class="checkout-coaches">
        <p id="backSearch"><a href="#">&lt; Back to search</a></p>
          <h3>Items</h3>
          <?php foreach($coaches as $coach): ?>
          <div class="coach-div coach-check" id="coach_<?= $coach->id ?>">
          <img class="coach-img" src="../content/images/<?= $coach->image ?>" alt="Image Coach"/>
          <p><?= $coach->registrationNumber ?></p>
          <p><?= $coach->type ?></p>
          <div class="coach-status">
            <div class="coach-addbasket">
              <button class="btn-remove-basket">Remove</button>
            </div>
            <div class="coach-info">
              <p><img src="../content/images/<?= $coach->make?>.jpg" /> <?= $coach->make . " - " . $coach->colour ?></p>
              <p><img src="../content/images/passengers.png" /> Max. Passengers: <span class="coachPassengers"><?= $coach->maxCapacity ?></span></p>
              <p><img src="../content/images/hourly.png" /> Daily Rate:   <span id="price">£<?= $coach->hourlyRate ?></span></p>
            </div>
        </div>
    </div>
    <?php endforeach ?>
        </article>
    </section>
    <?php require_once "../includes/footer.php"; ?>

    </div><!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/checkout_test.js"></script>
</body>
</html>