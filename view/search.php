<?php

require_once "../model/database.php";
require_once "../model/coach.php";

$coaches = getAllCoaches();
$VehicleTypes = getAllVehicleTypes();

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
    <title>Search Result</title>
</head>
<body>
    <div id="page">
      <?php
      require_once "./header.php";
      ?>

    <article class="main-article">
    <?php foreach($coaches as $coach): ?>
    <div class="coach-div">
        <img class="coach-img" src="../content/images/<?= $coach->image ?>" alt="Image Coach"/>
        <p>Registration Number: <?= $coach->registrationNumber ?></p>
        <p>Vehicle Type: <?= $coach->vehicleType ?></p>
        <p>Vehicle Testing: <?= $coach[0]->vehicleType) ?></p>
        <p>Make: <?= $coach->make ?></p>
        <p>Colour: <?= $coach->colour ?></p>
    </div>
    <?php endforeach ?>
    </article>

    <section>
    <?php foreach($VehicleTypes as $type): ?>
    <div>
        <p>VehicleType id: <?= $type->id ?></p>
        <p>Vehicle Type: <?= $type->type ?></p>
        <p>Make: <?= $type->maxCapacity ?></p>
        <p>Colour: <?= $type->hourlyRate ?></p>
    </div>
    <?php endforeach ?>
    </section>

    </div><!-- PAGE -->
    
</body>
</html>