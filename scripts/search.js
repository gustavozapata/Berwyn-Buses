//ADD TO BASKET BUTTON
$(".btn-add-basket").on("click", function() {
  updateBasket($(this), "remove");
});
//REMOVE FROM BASKET BUTTON
$(".btn-remove-basket").on("click", function() {
  updateBasket($(this), "add");
});

var freeSeats = 0;
var passengersLeft = parseInt($("#passengersLeft").text(), 10);
function updateBasket(button, action) {
  if (action === "add") {
    $("#basketItems").text(basketItems <= 0 ? 0 : --basketItems);
  } else {
    $("#basketItems").text(++basketItems);
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

function readyToCheckout() {}

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
      readyToCheckout();
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
  if (passengersLeft > 0) $("#coverPassengers, #seat").css("display", "none");
}

// SEARCH SUMMARY AND FILTER FIXED
$(window).scroll(function() {
  if ($(this).scrollTop() < $(".coach-results").position().top) {
    $(".search-filter").css({
      position: "absolute"
    });
  } else {
    $(".search-filter").css({
      position: "fixed"
    });
  }
});

//MOVE BASKET ON MOBILE
// window.addEventListener("resize", function(){
if (window.matchMedia("(max-width: 466px)").matches) {
  $("#movilBasket").html($("#liBasket a"));
} else {
  $("#movilBasket").html("");
}
// }, false);
//##### BASKET END

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
