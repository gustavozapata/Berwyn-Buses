<?php

require_once "../controller/checkout_controller.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/addcoach.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/checkout.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/signup.css" />
    <title>Checkout</title>
</head>
<body>
    <div id="page">
      <?php require_once "../includes/header.php"; ?>

    <section class="main-section">
        <article class="book-coach">
          <div class="book-coach-header">
            <h2>Check-out<span class="basketItems"><?= $_SESSION["basket"]->items ?></span></h2>
            <div id="line3"></div>
            <div id="line4"></div>
          </div>
          <div>
        </article>
        <article class="checkout-coaches">
        <?php if($comesFromSearch) : ?>
        <p class="backSearch"><a href="#">&lt; Back to search</a></p>
        <?php endif; ?> <!-- IF COMES FROM SEARCH -->
          <h3>Items</h3>
          <?php if($_SESSION["basket"]->items <= 0 || count($_SESSION["basket"]->coaches) <= 0) : ?>
          <div id="noItems">
            <p>You don't have any items to check-out 😔</p>
            <p class="backSearch"><a href="../view/index.php">Search</a>🔍</p>
          </div>
          <?php else : ?>
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
              <p><img src="../content/images/hourly.png" /> Daily Rate:   <span id="price">£<?= $coach->dailyRate ?></span></p>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <?php if($_SESSION["basket"]->isDriver): ?>
      <div class="drivers">
      <h4>Drivers</h4>
      <?php if(count($drivers) >= count($coaches)): ?>
        <p>✅Good news: there are drivers available for these dates.</p>
      <?php else: ?>
        <p><?= count($coaches) - count($drivers) ?> coache(s) won't have a driver this time.</p>
        <p>Someone else will have to drive it, provided they have the required licence.</p>
        <p>Sorry for the inconvenience 😐</p>
      <?php endif; ?>
      </div>
    <?php endif; ?>
    <div id="clearBasket">
      <a href="#">Clear basket🗑️</a>
    </div>
    </article>
    <hr>
    <!-- IF USER IS LOGGED -->
    <?php if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]) : ?>
    <article class="checkout-payment">
      <h3>Checkout Details</h3>
      <div id="checkoutDetails">
      <div class="total">
        <h4>Trip</h4>
        <p>From: <span id="fromspan"><?= $_SESSION["basket"]->from ?></span></p>
        <p>To: <span id="tospan"><?= $_SESSION["basket"]->to ?></span></p>
        <p>Passengers: <span id="passengersspan"><?= $_SESSION["basket"]->passengers ?></span></p>
        <p>Driver required: <span id="driverspan"><?= $_SESSION["basket"]->isDriver ? "Yes" : "No" ?></span></p>
        <p>Extra fee: <span id="extraspan">£<?= $_SESSION["basket"]->isDriver ? 100 : 0 ?></span></p>

      </div>
      
      <div class="total">
        <h4 class="total-title">Total</h4>
        <p>Coaches: <span id="coachesspan"><?= count($_SESSION["basket"]->coaches) ?></span></p>
        <p>Days: <span id="daysspan"><?= $difference = calculateTripDays() ?></span></p>
        <?php 
        $total = 0;
        foreach($coaches as $coach) {
          $total += $coach->dailyRate;
        }
        $days = $difference <= 0 ? 1 : $difference;
        $total += $_SESSION["basket"]->isDriver ? 100 : 0;
        ?>
        <p>Total: <span id="totalspan">£<?= $total *= $days ?></span></p>
        <p>VAT: <span>20%</span></p>
        <p>Grand Total: £<span id="grandtotalspan"><?= $total + ($total / 100) * 20 ?></span></p>
      </div>
      </div>
      <div id="promo">
        <p>Do you have a promo code?</p>
        <input name="promoCode">
        <p id="promoMessage"></p>
        <p id="promoPrice"></p>
        <button id="applyCodeButton">Apply</button>
      </div>
      <p>Choose payment method</p>
      <input id="visa" name="payment" type="radio" checked><label for="visa"><img src="../content/images/visa.png"></label>
      <input id="mastercard" name="payment" type="radio"><label for="mastercard"><img src="../content/images/master.png"></label><br>
      <button id="payButton">Pay</button>
      <span class="payment-msg">*Processed by a third party company</span>
    </article>
    <div class="promoBanner">
      <span></span>
      <h3>Promo Codes</h3>
      <?php $getCodes = getPromoCodes(); ?>
      <?php foreach($getCodes as $code): ?>
        <p><?= $code->code ?></p>
      <?php endforeach; ?>
    </div>
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

    </div><!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/checkout.js"></script>
</body>
</html>