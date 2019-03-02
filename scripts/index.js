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
var basketItems = $(".basketItems").text();
isBasketEmpty();
function isBasketEmpty() {
  if (!basketItems) {
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
  } else if (numPassengers > 500) {
    $("#warning")
      .text("Sorry max. 500 passengers")
      .css({
        opacity: 1,
        backgroundColor: "#FB3F3F",
        color: "white"
      });
  } else {
    $("#warning").css("opacity", "0");
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
var parametersUrl = "";
var departUrl = "";
var returnUrl = "";
var passengersUrl = "";
