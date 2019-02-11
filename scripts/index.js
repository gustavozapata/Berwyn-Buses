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
if (!basketItems) {
  $("#basketItems").css("visibility", "hidden");
}

$(".coach-addbasket button").on("click", function() {
  $("#basketItems").css("visibility", "visible");
  $("#basketItems").text(++basketItems);
  $(this)
    .parentsUntil(".coach-results")
    .css("display", "none");
});
//MOVE BASKET ON MOBILE
// window.addEventListener("resize", function(){
//   if (window.matchMedia("(max-width: 466px)").matches) {
//     $("#movilBasket").html($("#liBasket a"));
//   } else {
//     $("#movilBasket").html("");
//   }
// }, false);
//BASKET END

//##### BOOKING #####
$(".coach-div").on("click", function() {
  $(".coach-div-selected").removeClass("coach-div-selected");
  $(this).toggleClass("coach-div-selected");
  // $(this)
  //   .find(".coach-addbasket")
  //   .css("display", "block");
  // $(this)
  //   .find(".coach-info")
  //   .css("display", "none");
});
