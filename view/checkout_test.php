<!-- +we should return JSON and/or Plain text from our Ajax calls for the assignment -->
<?php

require_once "../controller/checkout_test_controller.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../includes/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../content/css/search.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/checkout_test.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/signup.css" />
    <link rel="stylesheet" type="text/css" href="../content/css/addcoach.css" />
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
        <p class="backSearch"><a href="#">&lt; Restart search</a></p>
        <?php endif; ?> <!-- IF COMES FROM SEARCH -->
          <h3>Items</h3>
          <?php if($_SESSION["basket"]->items < 1) : ?>
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
    <div id="clearBasket">
      <a href="#">Clear basket🗑️</a>
    </div>
    </article>
    <hr>
    <!-- IF USER IS LOGGED -->
    <?php if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]) : ?>
    <article class="checkout-payment">
      <h3>Payment Details</h3>
      <p>Choose payment method</p>
      <input id="visa" name="payment" type="radio" checked><label for="visa"><img src="../content/images/visa.png"></label>
      <input id="mastercard" name="payment" type="radio"><label for="mastercard"><img src="../content/images/master.png"></label><br>
      <button>Pay</button>
      <span>*Processed by a third party company</span>
    </article>
    <?php else : ?>
    <article class="checkout-payment">
      <h3>Sign up to check-out</h3>
      <form method="post" action="../controller/checkout_test_controller.php">
      <div>
      <span>
        <label>Given Name</label>
        <input name="givenName" required>
        <label>Family Name</label>
        <input name="familyName" required>
        <label>Date of Birth</label>
        <input name="dob" type="date" required>
        <label>Email</label>
        <input name="email" type="email" required>
        <label>Password</label>
        <input name="password" type="password" required>
        <label>Mobile Number</label>
        <input name="mobileNumber" type="number" required>
      </span>
      <span>
        <label>House Number</label>
        <input name="houseNumber" required>
        <label>Street Name</label>
        <input name="streetName" required>
        <label>Town</label>
        <input name="town" required>
        <label>Postcode</label>
        <input name="postcode" required>
        <label>Driving Licence</label>
        <input name="licence">
        <label>Licence Expiry Date</label>
        <input name="licenceExpiry" type="date">
      </span>
      </div>
      <input type="submit" value="Sign-up">
      </form>
    </article>
    <?php endif ?> <!-- IF USER IS LOGGED -->
    <?php endif ?> <!-- IF LESS THAN 1 ITEM -->

    <?php if(isset($_SESSION["accountCreated"]) && $_SESSION["accountCreated"]): ?>
      <div class="coachAddedBg">
        <div class="coachAddedPopup">
            <img src="../content/images/tick.png" alt="Tick Image">
            <p>The account has been created</p>
            <a href="../controller/checkout_test_controller.php">OK</a>
        </div>
      </div>
    <?php endif; ?>

    <div class="paymentBg">
        <div class="paymentPopup">
          <img class="paymentprocess" src="../content/images/process.png" alt="Process Payment Image">
          <p>We are processing your payment...</p>
          <!-- <a href="../controller/checkout_test_controller.php">OK</a> -->
        </div>
      </div>
    
    </section>
    <?php require_once "../includes/footer.php"; ?>

    </div><!-- PAGE -->
    <script src="../scripts/index.js"></script>
    <script src="../scripts/checkout_test.js"></script>
</body>
</html>