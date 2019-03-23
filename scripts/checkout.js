$(function() {
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
    $.get(
      "../controller/checkout_controller.php?completeBooking=" + booking,
      function() {
        window.location.href = "../controller/checkout_controller.php";
      }
    );
  }

  $("#loginBtn").on("click", function() {
    $(".login-container").css("display", "block");
  });
});
