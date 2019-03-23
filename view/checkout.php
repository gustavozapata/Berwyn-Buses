<?php require_once "../controller/cart.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../content/css/checkout.css">
    <link rel="stylesheet" type="text/css" href="../content/css/signup.css" />
   <link rel="stylesheet" type="text/css" href="../content/css/checkout_test.css" />
   <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <?php require_once "../includes/head.php";?>
    
    <title>Document</title>
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
                                    <div class="top"></div>
                                    <div class="bottom"></div>
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
                                                <?php if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]) : ?>
                                                <form method="post" action="../controller/promo_controller.php">
                                                    <input id="promoInput" type="text" name="promoCode">
                                                    <input id="submitPromo" type="submit" value="Add Code" name="submitPromo">
                                                 <?php if(isset($_REQUEST["promoCode"]) != null) : ?>
                                                    <p>Promo code: <?= $correctCode ?></p>
                                                    <p>Percentage off: <span id="percentOff"><?= $codeValue ?>%</span></p>
                                                 <?php endif; ?>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12 col-md-4 ">
                                    <div class="box-outline">
                                        <h2>Please sign in to complete booking</h2>
                                    </div> -->
                                    <?php if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]) : ?>
    <article class="checkout-payment">
      <h3>Payment Details</h3>
      <p>Choose payment method</p>
      <input id="visa" name="payment" type="radio" checked><label for="visa"><img src="../content/images/visa.png"></label>
      <input id="mastercard" name="payment" type="radio"><label for="mastercard"><img src="../content/images/master.png"></label><br>
      <button>Pay</button>
      <span class="payment-msg">*Processed by a third party company</span>
    </article>
    <?php else : ?>
    <article class="checkout-payment">
      <h3>Sign up to check-out</h3>
      <form method="post" action="../controller/checkout_test_controller.php">
        <?php require_once "../view/signup.php"; ?>
        <input type="hidden" name="fromLogin">
        <input type="submit" value="Sign-up">
      </form>
      <hr>
      <div class="no-account">
        <p>Already have an account?</p>
        <p><a id="loginBtn">Login</a></p>
      </div>
      <div class="login-container">
        <form method="post" action="../controller/checkout_test_controller.php">
          <label>Email</label>
          <input type="email" name="emailFromBasket" required>
          <label>Password</label>
          <input type="password" name="passwordFromBasket" required>
          <input type="submit" value="Login">
        </form>
      </div>
    </article>
    <?php endif ?> <!-- IF USER IS LOGGED -->

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