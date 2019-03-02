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
  redirectCheckoutPage();
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
      window.location.href =
        "../controller/checkout_test_controller.php?basketItems=" +
        basketItems +
        "&coachSelection=" +
        coachSelection;
    } else {
      $("#infoBanner").css("bottom", "0");
      $("#infoBanner p").html("Some passengers need to be accommodated first");
    }
  });
}

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

//PAUL'S CODE
function ajaxSearch() {
  var search = $("input[name=ajaxsearchname]")
    .val()
    .trim();
  $.get(
    "getCustomersBySurname_service.php?surname=" + search,
    ajaxSearchCallback
  );
}
function ajaxSearchCallback(results) {
  // results will be an array of Javascript objects which precisely match
  // the Customer objects in PHP land.

  // wipe out the existing rows in the table seeing as how we're replacing them
  $("table#resultstable tbody").empty();
  // now we can iterate through results
  for (var i = 0; i < results.length; i++) {
    var customer = results[i];
    // build a new table row
    var newrow = $("<tr></tr>");
    // just so we can see the difference between AJAX-generated rows and
    // normal rows
    newrow.css("color", "blue");
    // build the table cells
    newrow.append("<td>" + customer.givenname + "</td>");
    newrow.append("<td>" + customer.surname + "</td>");
    newrow.append("<td>" + customer.address + "</td>");
    // append the new row to the table
    $("table#resultstable tbody").append(newrow);
  }
}
