//ADD TO BASKET BUTTON
$(".btn-add-basket").on("click", function() {
  updateBasket($(this), "remove");
});
//REMOVE FROM BASKET BUTTON
$(".btn-remove-basket").on("click", function() {
  updateBasket($(this), "add");
});

function updateBasket(button, action) {
  // var passengersLeft = parseInt($("#passengersLeft").text(),10);
  var thisCoachPassengers = parseInt(button
    .parentsUntil(".coach-results")
    .find(".coachPassengers")
    .text(), 10);
  if (action === "add") {
    $("#basketItems").text(basketItems <= 0 ? 0 : --basketItems);
    $("#passengersLeft").text(parseInt($("#passengersLeft").text(),10) + thisCoachPassengers);
      // .removeClass("coverPassengers");
  } else {
    $("#basketItems").text(++basketItems);
    $("#passengersLeft")
      .text(
        thisCoachPassengers > parseInt($("#passengersLeft").text(),10)
          ? 0
          : $("#passengersLeft").text() - thisCoachPassengers
      );
      // .addClass("coverPassengers");
  }
  isBasketEmpty();
  button.parentsUntil(".coach-results").toggleClass("coach-in-basket");
  button.css("display", "none");
  button
    .parentsUntil(".coach-status")
    .find(".btn-" + action + "-basket")
    .css("display", "inline");
}

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
  // $(this)
  //   .find(".coach-addbasket")
  //   .css("display", "block");
  // $(this)
  //   .find(".coach-info")
  //   .css("display", "none");
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
