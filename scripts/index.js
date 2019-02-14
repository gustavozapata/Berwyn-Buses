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
var basketItems = $("#basketItems").text();
isBasketEmpty();
function isBasketEmpty() {
  if (!basketItems) {
    $("#basketItems").css("visibility", "hidden");
  } else {
    $("#basketItems").css("visibility", "visible");
  }
}

//##### BOOK COACH FORM #####
$("input[name='passengers']").on("keyup", function() {
  if ($(this).val() > 73) {
    $("#overcapacity").css("opacity", "1");
  } else {
    $("#overcapacity").css("opacity", "0");
  }
});
