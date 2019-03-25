$(".checkout_test").attr("href", "#");
$(".checkout_test").on("click", function(e) {
  e.preventDefault();
  checkBookIsReady();
});

//##### SEARCH SUMMARY #####
var freeSeats = 0;
var passengersLeft = parseInt($("#passengersLeft").text(), 10);
var isBookingReady = false;

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
    // $(".basketItems").html(basketItems <= 0 ? 0 : --basketItems);
    if (backSearch) {
      var ele = button
        .parent()
        .parent()
        .parent()
        .attr("id");
      ele = ele.substring(1, ele.length);
      var index = coachSelection.indexOf(ele);
      coachSelection.splice(index, 1);
    }
  } else {
    // $(".basketItems").html(++basketItems);
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
    "Perfecto. Now you can proceed to the <a onclick='goCheckoutAnyway()' class='checkout_test'>check-out</a> page"
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
}
//##### END SEARCH SUMMARY #####

function checkBookIsReady() {
  if (isBookingReady) {
    redirectCheckoutPage();
  } else {
    $("#infoBanner").css("bottom", "0");
    $("#infoBanner p").html(
      "Some passengers need to be accommodated first. Go to the <a onclick='goCheckoutAnyway()' class='checkout'>check-out</a> page anyway"
    );
  }
}

var backSearch = parametersUrl.get("backSearch");
if (backSearch) {
  autoSelectPrevious();
  // $(".basketItems").text(parametersUrl.get("coachSelection").length);
}

function autoSelectPrevious() {
  var str = parametersUrl.get("coachSelection");
  coachSelection = str.split(",");
  if (coachSelection.length > 0) {
    var j = 0;
    $(coachSelection).each(function() {
      updateBasket(
        $("#x" + coachSelection[j]).find(".btn-add-basket"),
        "remove"
      );
      j++;
    });
  }
}

//##### PROCEED TO CHECKOUT #####
function redirectCheckoutPage() {
  var i = 0;
  $(".coach-in-basket[id^=x]").each(function() {
    var coach = $(this)
      .attr("id")
      .slice(1);
    if (!coachSelection.includes(coach)) coachSelection[i] = coach;
    i++;
  });
  sendSearch();
}

function goCheckoutAnyway() {
  isBookingReady = true;
  checkBookIsReady();
}

function sendSearch() {
  //https://stackoverflow.com/questions/9870512/how-to-obtain-the-query-string-from-the-current-url-with-javascript
  parametersUrl = new URL(document.location).searchParams;
  departUrl = parametersUrl.get("depart");
  returnUrl = parametersUrl.get("return");
  passengersUrl = parametersUrl.get("passengers");
  // completeBook =
  //   "&basketItems=" + basketItems + "&coachSelection=" + coachSelection;
  completeBook = "&coachSelection=" + coachSelection;
  window.location.href =
    "../controller/checkout_controller.php?depart=" +
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

//##### BOOKING #####
$(".coach-div").on("click", function() {
  $(".coach-div-selected").removeClass("coach-div-selected");
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
