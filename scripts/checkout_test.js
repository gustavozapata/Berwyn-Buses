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
    clearBasket();
  });

  /* RULES IF DELETE ITEMS */
  /* $(".coach-div").on("click", function() {
    $(".coach-div-selected").removeClass("coach-div-selected");
    $(this).toggleClass("coach-div-selected");
  }); */
});
