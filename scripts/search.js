$(".checkout_test").attr("href", "#");
$(".checkout_test").on("click", function() {
  if (!isBookingReady) {
    $("#infoBanner").css("bottom", "0");
    $("#infoBanner p").html(
      "Some passengers need to be accommodated first. Go to the <a onclick='sendSearch(false)' class='checkout'>check-out</a> page anyway"
    );
  }
});

//##### SEARCH SUMMARY #####
var freeSeats = 0;
var passengersLeft = parseInt($("#passengersLeft").text(), 10);
var isBookingReady = false;
var coachSelection = [];

//ADD TO BASKET BUTTON
$(".btn-add-basket").on("click", function() {
  updateBasket($(this), "remove");
});
//REMOVE FROM BASKET BUTTON
$(".btn-remove-basket").on("click", function() {
  updateBasket($(this), "add");
});

function updateBasket(button, action) {
  if (action === "add") {
    $(".basketItems").text(basketItems <= 0 ? 0 : --basketItems);
  } else {
    $(".basketItems").text(++basketItems);

  }
  isBasketEmpty();
  updateSummary(button, action);
  button.parentsUntil(".coach-results").toggleClass("coach-in-basket");
  button.css("display", "none");
  button
    .parentsUntil(".coach-status")
    .find(".btn-" + action + "-basket")
    .css("display", "inline");
}

function readyToCheckout(value) {
  $("#infoBanner").css("bottom", value);
  $("#infoBanner p").html(
    "Perfecto. Now you can proceed to the <a class='checkout_test'>check-out</a> page"
  );
}

$("#infoBanner img").on("click", function() {
  readyToCheckout(-100);
});

function updateSummary(button, action) {
  var thisCoachPassengers = parseInt(
    button
      .parentsUntil(".coach-results")
      .find(".coachPassengers")
      .text(),
    10
  );

  if (action === "remove") {
    //IF ADD BUTTON IS PRESSED
    if (passengersLeft - thisCoachPassengers <= 0) {
      freeSeats = thisCoachPassengers - passengersLeft;
      $("#coverPassengers, #seat").css("display", "inline");
      readyToCheckout(0);
    }
    passengersLeft -= thisCoachPassengers;
  } else {
    //IF REMOVE BUTTON IS PRESSED
    if (passengersLeft <= 0) {
      freeSeats -= thisCoachPassengers;
    }
    passengersLeft += thisCoachPassengers;
  }
  $("#passengersLeft").text(passengersLeft <= 0 ? 0 : passengersLeft);
  $("#freeSeats").text(freeSeats <= 0 ? 0 : freeSeats);
  if (passengersLeft > 0) {
    $("#coverPassengers, #seat").css("display", "none");
    readyToCheckout(-100);
    isBookingReady = false;
  } else {
    isBookingReady = true;
  }
  //redirectCheckoutPage();
}
//##### END SEARCH SUMMARY #####

//##### PROCEED TO CHECKOUT #####
function redirectCheckoutPage() {
  $(".checkout_test").on("click", function() {
    if (isBookingReady) {
      var i = 0;
      $(".coach-in-basket[id^=x]").each(function() {
        coachSelection[i] = $(this)
          .attr("id")
          .slice(1);
        i++;
      });
      sendSearch(true);
    } else {
      $("#infoBanner").css("bottom", "0");
      $("#infoBanner p").html(
        "Some passengers need to be accommodated first. Go to the <a onclick='sendSearch(false)' class='checkout'>check-out</a> page anyway"
      );
    }
  });
}

function sendSearch(bookingComplete) {
  //https://stackoverflow.com/questions/9870512/how-to-obtain-the-query-string-from-the-current-url-with-javascript
  parametersUrl = new URL(document.location).searchParams;
  departUrl = parametersUrl.get("depart");
  returnUrl = parametersUrl.get("return");
  passengersUrl = parametersUrl.get("passengers");
  var completeBook = bookingComplete
    ? "&basketItems=" + basketItems + "&coachSelection=" + coachSelection
    : "";
  window.location.href =
    "../controller/checkout_test_controller.php?depart=" +
    departUrl +
    "&return=" +
    returnUrl +
    "&passengers=" +
    passengersUrl +
    "&price=" +
    priceUrl +
    completeBook;
}

//##### FILTER SEARCH #####
//SEARCH FILTER MOVES AS USER SCROLLS
$(window).scroll(function() {
  if ($(this).scrollTop() < $(".coach-results").position().top) {
    $(".search-filter").css({
      position: "absolute",
      top: "initial"
    });
  } else {
    $(".search-filter").css({
      position: "fixed",
      top: "10px"
    });
  }
});

$("#applySearch").on("click", function() {
  var filterPassengers = $("#filterPassengers").val();
  var filterPrice = $("#filterPrice").val();
  window.location.href =
    "../controller/search_controller.php?depart=" +
    departUrl +
    "&return=" +
    returnUrl +
    "&passengers=" +
    filterPassengers +
    "&price=" +
    filterPrice +
    "";
});

//MOVE BASKET ON MOBILE
window.addEventListener(
  "resize",
  function() {
    if (window.matchMedia("(max-width: 466px)").matches) {
      $("#movilBasket").html($("#liBasket a"));
    } else {
      $("#movilBasket").html("");
    }
  },
  false
);
//##### BASKET END

//##### BOOKING #####
$(".coach-div").on("mouseover", function() {
  $(".coach-div-selected").removeClass("coach-div-selected");
  $(this).toggleClass("coach-div-selected");
});

$(".coach-div").on("mouseout", function() {
  $(".coach-div-selected").addClass("coach-div-selected");
  $(this).toggleClass("coach-div-selected");
});

//##### FILTER SEARCH #####
$("#filterPassengers").on("input", function() {
  $(this).attr("value", $(this).val());
  $("#outputPassengers").text($(this).val());
});
$("#filterPrice").on("input", function() {
  $(this).attr("value", $(this).val());
  $("#outputPrice").text($(this).val());
});

//Setting and removing the selected vehicles "regNum" in our regNums arrray
$('.coach-div').each(function(){
    var $cartInfo = $(this).children('#coachObj').val();
    var $regNum = $(this).children('#regNum').html(); //gets the text of reg number
   
    $(this).find('.btn-add-basket').on('click', function(){
        regNums.push($regNum);
        localStorage.setItem("regNums", JSON.stringify(regNums)); //adds the array to the local storage in the form of json
        $.post( "../controller/cart.php", {cart: $cartInfo});

    });

    $(this).find('.btn-remove-basket').on('click', function(){
        var pos = regNums.indexOf($regNum);//get the index of the reg number you want to remove
        regNums.splice(pos,1);//remove the reg number
        localStorage.setItem("regNums", JSON.stringify(regNums)); //update the current variable
        $.post( "../controller/cart.php", {remove: $cartInfo});
    });

        
});

