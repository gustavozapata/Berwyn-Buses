<?php require_once "../controller/cart.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../includes/head.php";?>
    <link rel="stylesheet" href="../content/css/checkout.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Check-out</title>
</head>
<body>
    <div id="page">
    <?php require_once "../includes/header.php";?>
        <section class="main-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="box-outline cart">
                            <div class="title">
                                <h1>Your cart</h1>
                                <div id="line3"></div>
                                <div id="line4"></div>
                                <!-- <div class="top"></div>
                                <div class="bottom"></div> -->
                            </div>
                            <?php foreach($_SESSION["cart"] as $vehicle):?>
                                <div class="row coach-info">
                                    <input type="hidden" id="coachObj" value='<?php echo json_encode($vehicle);?>'>
                                    <input type="hidden" id=registration value='<?= $vehicle->registrationNumber ?>'> 
                                    <div class ="col-sm-4 basketInfo" id="image" >
                                        <img src="../content/images/<?= $vehicle->image ?>" class="img-fluid" alt="Image Coach" />
                                    </div>
                                    <div id="basketItem" class ="col-sm-8 basketInfo" style="text-align:left;" >
                                        <h5><img src="../content/images/<?= $vehicle->make?>.jpg" /> <?= $vehicle->make . " - " . $vehicle->type ?></h5>
                                        <p id="regNum"> Registration Number: <?= $vehicle->registrationNumber ?></p> 
                                        <p>Colour: <?= $vehicle->colour ?></p>
                                        <p>Max. Passengers: <span class="coachPassengers" id="maxPasseners"><?= $vehicle->maxCapacity ?></span></p>
                                        <p>Daily rate: &#8356;<span id='rate'><?= $vehicle->dailyRate ?> </span></p>
                                        <?php if ($_SESSION["driver"]=="true"): ?>
                                        <p> A driver has been booked for this vehicle! <p>
                                        <?php endif; ?>
                                        <?php if  ($_SESSION["driver"]=="false"): ?>
                                        <p> No driver required. <p>
                                        <?php endif ;?>
                                        <button class="btn-remove-item">Remove</button>
                                    </div>
                                </div>                    
                            <?php endforeach; ?> 
                            <div class="row summary">
                                <div id="details" class="col-sm-12 col-md-6">
                                    <?php if ($_SESSION["trip"]['depart'] != "" && $_SESSION["trip"]['return'] != "") : ?>
                                    <h3>Trip details</h3>
                                    <p><span style="font-weight:bold; text-align:left;">Trip duration: </span><span id="start"><?= $_SESSION["trip"]['depart'] ?></span> - <span id="end"><?= $_SESSION["trip"]['return'] ?></span></p>
                                    <p><span style="font-weight:bold; text-align:left;">Number of passengers: </span><?= $_SESSION["trip"]['passengers'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div id="total" class="col-sm-12 col-md-6">
                                    <h2>Total: &#8356;<span id='total'>0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 ">
                        <div class="box-outline">
                            <h2>Please sign in to complete booking</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<!-- BOOTSTRAP SCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="../scripts/total.js"></script>
</body>
</html>