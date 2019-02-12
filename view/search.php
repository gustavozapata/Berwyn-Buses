<?php
require_once "../controller/cart.php";
require_once "../controller/search_controller.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../view/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <title>Search Result</title>
</head>
<body>
    <div id="page">
      <?php
      require_once "../view/header.php";
      ?>

    <section class="main-section">

    <div class="search-filter">
      <h3>Refine Search</h3>
    </div>
    
    <div class="coach-results">
    <?php foreach($coaches as $coach): ?>
    <div class="coach-div">
      <form action="#" method="post" id="cartForm">
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
              <input type="hidden" id="regNumber" name="regNumber" value="<?= $coach->registrationNumber ?>">
              <input type="hidden" id="vehicleType" name="vehicleType" value="<?= $coach->vehicleType ?>">
              <input type="hidden" id="coachIMG" name="coachIMG" value="../content/images/<?= $coach->image ?>">
              <input type="hidden" id="rate" name="rate" value="<?= $coach->hourlyRate ?>">
              <button type="submit"  value="Add to basket">Add to basket</button>
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