//##### VIEWPORT #####
var viewport = Math.max(
  document.documentElement.clientHeight,
  window.innerHeight || 0
);
// var page = document.getElementById("page");
// page.style.height = viewport + "px";
//VIEWPORT END

//##### CHAT #####
//   $(".contact").on("click", function() {
//     $(this).toggleClass("contact-open");
//   });

//##### BASKET #####
var basketItems = parseInt($(".basketItems").text(), 10);
isBasketEmpty();
function isBasketEmpty() {
  if (!basketItems || basketItems < 1) {
    $(".basketItems").css("visibility", "hidden");
  } else {
    $(".basketItems").css("visibility", "visible");
  }
}

//##### BOOK COACH FORM #####
$("input[name='passengers']").on("keyup", function() {
  var numPassengers = $(this).val();
  if (numPassengers > 73 && numPassengers <= 500) {
    $("#warning")
      .text("You might need to book more than one coach")
      .css({
        opacity: 1,
        backgroundColor: "#ffdd00",
        color: "black"
      });
    $('input[value="Search"]').prop("disabled", false);
  } else if (numPassengers > 500) {
    $("#warning")
      .text("Sorry max. 500 passengers")
      .css({
        opacity: 1,
        backgroundColor: "#FB3F3F",
        color: "white"
      });
    $('input[value="Search"]').prop("disabled", true);
  } else {
    $("#warning").css("opacity", "0");
    $('input[value="Search"]').prop("disabled", false);
  }
});

// CONTACT US
// $(".contact").on("click", function(){
//   $(".faded-background").fadeIn();
//   $(".modal").fadeIn();
// });

// $(".faded-background").on("click", function(){
//   $(".faded-background").fadeOut();
//   $(".modal").fadeOut();
// });

// NO COOKIES BANNER
$(document).ready(function() {
  if (window.location.pathname.includes("index.php")) {
    $("#infoBanner").css("bottom", "0");
    $("#infoBanner img").on("click", function() {
      $("#infoBanner").css("bottom", "-100px");
    });
  }
});

//BACK TO SEARCH URL PARAMETERS
var parametersUrl = new URL(document.location).searchParams;
var departUrl = parametersUrl.get("depart");
var returnUrl = parametersUrl.get("return");
var passengersUrl = parametersUrl.get("passengers");
var priceUrl = parametersUrl.get("price");
var completeBook = {};
var coachSelection = [];

//LOGIN - SIGNUP
$("#signupBtn").on("click", function() {
  $(".signupBg").css("display", "block");
});
$(".account-created").on("click", function() {
  window.location.href = "../controller/checkout_controller.php?fromLogin=true";
});
$(".signupPopup img").on("click", function() {
  $(".signupBg").css("display", "none");
});

//MOVING BASKET (RESPONSIVE PURPOSE)
// if (window.matchMedia("(max-width: 466px)").matches) {
//   $(".checkout_test").appendTo("movilBasket");
// }
