<?php

require_once "../model/database.php";
require_once "../model/coach.php";

$coaches = getAllCoaches();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "./head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <title>Search Result</title>
</head>
<body>
    <div id="page">
      <?php
      require_once "./header.php";
      ?>

    <section class="main-section">

    <div class="search-filter">
      <h3>Refine Search</h3>
    </div>
    
    <div class="coach-results">
    <?php foreach($coaches as $coach): ?>
    <div class="coach-div">
      <form action="../view/checkout.php" method="post" id="cartForm">
        <img class="coach-img" src="../content/images/<?= $coach->image ?>" alt="Image Coach"/>
        <p><?= $coach->registrationNumber ?></p>
        <p><?= $coach->vehicleType ?></p>
        <div class="coach-status">
            <div class="coach-info">
              <p><img src="../content/images/<?= $coach->make?>.jpg" /> <?= $coach->make . " - " . $coach->colour ?></p>
              <p><img src="../content/images/passengers.png" /> Max. Passengers: <?= $coach->maxCapacity ?></p>
              <p><img src="../content/images/hourly.png" /> Hourly Rate:   <span id="price">£<?= $coach->hourlyRate ?></span></p>
            </div>
            <div class="coach-addbasket">
              <input type="hidden" id="registrationNumber" name="registrationNumber" value="<?= $coach->registrationNumber ?>">
              <button type="submit" form="cartForm" value="Add to basket">Add to basket</button>
            </div>
        </div>
      </form>
    </div>
    <?php endforeach ?>
    </div>
    
    </section>

    </div><!-- PAGE -->
    <script src="../scripts/index.js"></script>
</body>
</html>