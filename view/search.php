<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <title>Search Result</title>
</head>
<body>
    <div id="page">
      <?php require_once "../includes/header.php"; ?>

    <section class="main-section">

    <div class="search-filter">

      <h3>Summary</h3>
      <div>
        <p>Passengers<br><span><?= $_REQUEST["passengers"] ?></span></p>
        <p>Passengers left<br><span id="passengersLeft"><?= $_REQUEST["passengers"] ?></span></p>
      </div>
      <h3 class="filterTitle">Filter Search</h3>
      <div>
        <p>Passengers<br><span id="outputPassengers"><?= $_REQUEST["passengers"] ?></span></p>
        <input type="range" min="5" max="500" value="<?= $_REQUEST["passengers"] ?>" id="filterPassengers">
        <p>Price<br><span id="outputPrice">55</span></p>
        <input type="range" min="55" max="150" value="55" id="filterPrice">
      </div>
      <button>Apply</button>
    </div><!-- search-filter -->
    <div class="coach-results">
    <?php foreach($coaches as $coach): ?>
    <div class="coach-div">
    <input type="hidden" id="coachObj" value='<?php echo json_encode($coach);?>'> 
    <p><?php echo print_r($coach)?></p>
        <img class="coach-img" id="coachIMG" src="../content/images/<?= $coach->image ?>" alt="Image Coach"/>
        <p id="regNum"><?= $coach->registrationNumber ?></p>
        <p id="type"><?= $coach->vehicleType ?></p>
        <div class="coach-status">
            <div class="coach-addbasket">
              <button class="btn-add-basket">Add to basket</button>
              <button class="btn-remove-basket">Remove</button>
            </div>
            <div class="coach-info">
              <p><img src="../content/images/<?= $coach->make?>.jpg" /> <?= $coach->make . " - " . $coach->colour ?></p>
              <p><img src="../content/images/passengers.png" /> Max. Passengers: <span class="coachPassengers" id="maxPasseners"><?= $coach->maxCapacity ?></span></p>
              <p><img src="../content/images/hourly.png" /> Hourly Rate:   <span id="price">£<?= $coach->hourlyRate ?></span></p>
            </div>
            <div class="coach-addbasket">
            </div>
        </div>
        <?php // "coach-addbasket" - for every instance of coach, store it's parameters in hidden form fields to be passed into SESSION variable. ?>
    </div>
    
    <?php endforeach ?>
    </div>
    
    </section>

    <?php require_once "../includes/footer.php"; ?>
    </div><!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/search.js"></script>
    <script src="../scripts/total.js"></script>
</body>
</html>