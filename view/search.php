<?php

require_once "../model/database.php";
require_once "../model/coach.php";

$coaches = getAllCoaches();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="../content/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Search Result</title>
</head>
<body>
    <div id="page">
      <?php
      require_once "./header.php";
      ?>

    <section class="main-section">
    <?php foreach($coaches as $coach): ?>
    <div class="coach-div">
        <img class="coach-img" src="../content/images/<?= $coach->image ?>" alt="Image Coach"/>
        <p><?= $coach->registrationNumber ?></p>
        <p><?= $coach->vehicleType ?></p>
        <div class="coach-status">
            <p><img src="../content/images/<?= $coach->make?>.jpg" /> <?= $coach->make . " - " . $coach->colour ?></p>
            <p><img src="../content/images/passengers.png" /> Max. Passengers: <?= $coach->maxCapacity ?></p>
            <p><img src="../content/images/hourly.png" /> Hourly Rate: <?= $coach->hourlyRate ?></p>
        </div>
    </div>
    <?php endforeach ?>
    </section>

    </div><!-- PAGE -->
    <script src="../scripts/index.js"></script>
</body>
</html>