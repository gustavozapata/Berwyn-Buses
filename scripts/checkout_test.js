$(function() {
  isBasketEmpty();

  $("#liBasket .basketItems").css("visibility", "hidden");
  $("#movilBasket .basketItems").css("visibility", "hidden");

  //BACK TO SEARCH
  $(".backSearch").on("click", function() {
    window.location.href =
      "../controller/search_controller.php?depart=" +
      departUrl +
      "&return=" +
      returnUrl +
      "&passengers=" +
      passengersUrl +
      "&price=" +
      priceUrl +
      "&reset=1";
  });

  //CLEAR BASKET
  $("#clearBasket a").on("click", function() {
    clearBasket();
  });
  function clearBasket() {
    $.get(
      "../controller/checkout_test_controller.php?clearBasket=0",
      function() {
        window.location.href = "../controller/checkout_test_controller.php";
      }
    );
  }

  //PAYMENT
  $(".checkout-payment button").on("click", function() {
    $(".paymentBg").css("display", "block");
    setTimeout(function() {
      $(".paymentprocess").toggleClass("stopPaymentProcess");
      $(".stopPaymentProcess")
        .attr("src", "../content/images/tick.png")
        .css("width", "45px");
      $(".paymentPopup p").text("Thanks. Your payment has been received.");
      $(".paymentPopup a").css("visibility", "visible");
    }, 4000);
  });

  $(".paymentPopup a").on("click", function() {
    completeBooking();
  });

  function completeBooking() {
    var booking = {
      passengers: passengersUrl,
      datefrom: departUrl,
      dateto: returnUrl
    };
    booking = JSON.stringify(booking);
    alert(booking);
    $.get(
      "../controller/checkout_test_controller.php?completeBooking=" + booking,
      function() {
        window.location.href = "../controller/checkout_test_controller.php";
      }
    );
  }

  $("#loginBtn").on("click", function() {
    $(".login-container").css("display", "block");
  });
});
