$(function() {
  isBasketEmpty();

  $("#liBasket .basketItems").css("visibility", "hidden");
  $("#movilBasket .basketItems").css("visibility", "hidden");

  //BACK TO SEARCH
  parametersUrl = new URL(document.location).searchParams;
  coachSelection = parametersUrl.get("coachSelection");
  basketItems = parseInt(parametersUrl.get("basketItems"), 10);

  $(".backSearch").on("click", function() {
    // completeBook =
    //   "&basketItems=" + basketItems + "&coachSelection=" + coachSelection;
    completeBook = "&coachSelection=" + coachSelection;
    window.location.href =
      "../controller/search_controller.php?depart=" +
      departUrl +
      "&return=" +
      returnUrl +
      "&passengers=" +
      passengersUrl +
      "&price=" +
      priceUrl +
      completeBook +
      "&backSearch=true";
  });

  //CLEAR BASKET
  $("#clearBasket a").on("click", function() {
    clearBasket();
  });
  function clearBasket() {
    $.get("../controller/checkout_controller.php?clearBasket=0", function() {
      window.location.href = "../controller/checkout_controller.php";
    });
  }

  //PAYMENT
  $("#payButton").on("click", function() {
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
    // var booking = {
    //   passengers: passengersUrl,
    //   datefrom: departUrl,
    //   dateto: returnUrl
    // };
    // booking = JSON.stringify(booking);
    $.get(
      "../controller/checkout_controller.php?completeBooking=yes",
      function() {
        window.location.href = "../controller/checkout_controller.php";
      }
    );
  }

  //APPLY PROMO CODE
  $("#applyCodeButton").on("click", function() {
    var promoCode = $("input[name='promoCode']").val();
    if (promoCode != "") {
      promoCode = JSON.stringify(promoCode);
      $.get(
        "../controller/checkout_controller.php?applyPromo=" + promoCode,
        checkPromo
      );
    }
  });

  //PROMO BANNER
  $(".promoBanner span").on("click", function() {
    $(".promoBanner").toggleClass("promoBanner-open");
  });

  function checkPromo(results) {
    if (results[0]) {
      $("#promoMessage").text(results[0].description);
      $("#promoMessage")
        .append("<p>Applied</p>")
        .css("color", "green");
      $("#promoPrice").show();
      var discount =
        $("#grandtotalspan").text() * ((100 - results[0].amount) / 100);
      // discount += $("#grandtotalspan").text();
      $("#promoPrice").text("Grand Total: £" + discount.toFixed(2));
    } else {
      $("#promoMessage")
        .text("Promo Code incorrect")
        .css("color", "orangered");
      $("#promoPrice").hide();
    }
  }

  $("#loginBtn").on("click", function() {
    $(".login-container").css("display", "block");
  });
});
