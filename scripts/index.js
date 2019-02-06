//VIEWPORT
var viewport = Math.max(
  document.documentElement.clientHeight,
  window.innerHeight || 0
);
// var page = document.getElementById("page");
// page.style.height = viewport + "px";

//CHAT
//   $(".contact").on("click", function() {
//     $(this).toggleClass("contact-open");
//   });

//BASKET
// window.addEventListener("resize", function(){
//   if (window.matchMedia("(max-width: 466px)").matches) {
//     $("#movilBasket").html($("#liBasket a"));
//   } else {
//     $("#movilBasket").html("");
//   }
// }, false);

//BOOKING
$(".coach-div").on("click", function() {
  $(this)
    .find(".coach-status")
    .replaceWith("<button>Add to basket</button>");
});
