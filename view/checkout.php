<?php
require_once "../controller/checkout_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?php require_once "../includes/head.php";?>
    <link rel="stylesheet" type="text/css" href="../content/css/checkout.css">
    <link rel="stylesheet" type="text/css" href="../content/css/signup.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/checkout_test.css"/>
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <title>Check-out
    </title>
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
                </div>
                <?php foreach($_SESSION["cart"] as $vehicle):?>
                <div class="row coach-info">
                  <input type="hidden" id="coachObj" value='<?php echo json_encode($vehicle);?>'>
                  <input type="hidden" id=registration value='<?= $vehicle->registrationNumber ?>'> 
                  <div class ="col-sm-4 basketInfo" id="image" >
                    <img src="../content/images/<?= $vehicle->image ?>" class="img-fluid" alt="Image Coach" />
                  </div>
                  <div id="basketItem" class ="col-sm-8 basketInfo" style="text-align:left;" >
                    <h5><img src="../content/images/<?= $vehicle->make?>.jpg" /><?= $vehicle->make . " - " . $vehicle->type ?></h5>
                    <p>id: <?= $vehicle->id ?></p>
                    <p id="regNum"> Registration Number: <?= $vehicle->registrationNumber ?></p> 
                    <p>Colour: <?= $vehicle->colour ?></p>
                    <p>Max. Passengers: 
                      <span class="coachPassengers" id="maxPasseners">
                        <?= $vehicle->maxCapacity ?>
                      </span>
                    </p>
                    <p>Daily rate: &#8356;<span id='rate'><?= $vehicle->dailyRate ?></span></p>
                    <?php if ($_SESSION["driver"]=="true"): ?>
                    <p>A driver has been booked for this vehicle! 
                    <p>
                      <?php endif; ?>
                      <?php if  ($_SESSION["driver"]=="false"): ?>
                    <p> No driver required. 
                    <p>
                      <?php endif ;?>
                      <button class="btn-remove-item">Remove</button>
                  </div>
                </div>                    
                <?php endforeach; ?> 

                <?php if(isset($_SESSION["driver"]) && $_SESSION["driver"]=="true"): ?>
                <div class="drivers">
                <h4>Drivers</h4>
                  <?php if(count($_SESSION["drivers"]) >= count($_SESSION["coaches"])): ?>
                    <p>✅Good news: there are drivers available for these dates.</p>
                  <?php else: ?>
                    <p><?= count($_SESSION["coaches"]) - count($_SESSION["drivers"]) ?> coache(s) won't have a driver this time.</p>
                    <p>Someone else will have to drive it, provided they have the required licence.</p>
                    <p>Sorry for the inconvenience 😐</p>
                  <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="row summary">
                  <div id="details" class="col-sm-12 col-md-6">
                    <?php if ($_SESSION["trip"]['depart'] != "" && $_SESSION["trip"]['return'] != "") : ?>
                    <h3>Trip details
                    </h3>
                    <p>
                      <span style="font-weight:bold; text-align:left;">Trip duration: 
                      </span>
                      <span id="start"><?= $_SESSION["trip"]['depart'] ?></span> - 
                      <span id="end"><?= $_SESSION["trip"]['return'] ?></span>
                    </p>
                    <p>
                      <span style="font-weight:bold; text-align:left;">Number of passengers: </span>
                      <?= $_SESSION["trip"]['passengers'] ?>
                    </p>
                    <?php endif; ?>
                  </div>

                </div>
              </div>
            </div>
            <?php if(!empty($_SESSION["cart"])) : ?>
            <?php if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]) : ?>

    <article class="checkout-payment">
      
      
          <div id="total">
          <h2>Total: &#8356;<span id='total'>0</span></h2>
            <form method="post" action="../controller/promo_controller.php">
              <input id="promoInput" type="text" name="promoCode">
              <input id="submitPromo" type="submit" value="Apply Code" name="submitPromo">
              <?php if(isset($_REQUEST["promoCode"]) != null) : ?>
                <p>Promo code: <?= $correctCode ?></p>
                <p>Percentage off: <span id="percentOff"><?= $codeValue ?>%</span></p>
              <?php endif; ?>
            </form>
        </div>
      
      <p>Choose payment method</p>
      <input id="visa" name="payment" type="radio" checked><label for="visa"><img src="../content/images/visa.png"></label>
      <input id="mastercard" name="payment" type="radio"><label for="mastercard"><img src="../content/images/master.png"></label><br>
      <button id="payButton">Pay</button>
      <span class="payment-msg">*Processed by a third party company</span>
    </article>
    <?php else : ?>
    <article class="checkout-payment">
      <h3>Sign up to check-out</h3>
      <form method="post" action="../controller/checkout_controller.php">
        <?php require_once "../view/signup.php"; ?>
        <input type="hidden" name="fromLogin">
        <input type="submit" value="Sign-up">
      </form>
      <hr>
      <div class="no-account">
        <p>Already have an account?</p>
        <h3 id="loginBtn">Login</h3>
      </div>
      <div class="login-container">
        <form method="post" action="../controller/checkout_controller.php">
          <?php if(isset($_REQUEST["emailFromBasket"])): ?>
            <p id="loginStatus">Username or password incorrect</p>
          <?php endif; ?>
          <label>Email</label>
          <input type="email" name="emailFromBasket" required>
          <label>Password</label>
          <input type="password" name="passwordFromBasket" required>
          <input type="submit" value="Login">
        </form>
      </div>
    </article>
    <?php endif ?> <!-- IF USER IS LOGGED -->
    <?php endif ?> <!-- IF LESS THAN 1 ITEM -->

    <?php if(isset($_SESSION["accountCreated"]) && $_SESSION["accountCreated"]): ?>
      <div class="coachAddedBg">
        <div class="coachAddedPopup">
            <img src="../content/images/tick.png" alt="Tick Image">
            <p>The account has been created</p>
            <a href="../controller/checkout_controller.php">OK</a>
        </div>
      </div>
    <?php endif; ?>

    <div class="paymentBg">
        <div class="paymentPopup">
          <img class="paymentprocess" src="../content/images/process.png" alt="Process Payment Image">
          <p>We are processing your payment...</p>
          <a href="#">OK</a>
        </div>
      </div> 
</section>
<?php require_once "../includes/footer.php"; ?>
</div>
<!-- BOOTSTRAP SCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="../scripts/index.js"></script>
<script src="../scripts/total.js"></script>
<script src="../scripts/checkout.js"></script>
</body>
</html>
