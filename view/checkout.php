<?php require_once "../controller/cart.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?php require_once "../includes/head.php";?>
    
    <title>Document</title>
</head>
<body>
    <div id="page">
    <?php require_once "../includes/header.php";?>
        <section class="main-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 ">
                        <div class="box-outline">
                            <h1>Your cart</h1>
                            <hr/>
                            <?php echo sizeof($_SESSION["cart"]); ?>
                            <?php foreach($_SESSION["cart"] as $vehicle):?>
                            <div class="row coach-info">
                                <div class ="col-sm-4 basketInfo" id="image" >
                                    <img src="../content/images/<?= $vehicle->image ?>" class="img-fluid" alt="Image Coach" />
                                </div>
                                <div id="basketItem" class ="col-sm-8 basketInfo" style="text-align:left;" >
                                    <p> Registration Number:<?= $vehicle->registrationNumber ?> </p> 
                                    <p>Hourly rate: &#8356;<span id='rate'><?= $vehicle->hourlyRate ?> </span></p>
                                </div>
                            </div>
                            <hr/>
                            <?php endforeach; ?> 
                            <div>Total: &#8356;<span id='total'>0</span></div>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="box-outline">
                        <h2>Please sign in to complete booking</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require_once "../scripts/call_last.php";?>
<?php require_once "../scripts/checkout_script.php";?>
<script src="../scripts/total.js"></script>
</body>
</html>