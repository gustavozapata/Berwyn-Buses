$(function() {
  isBasketEmpty();

  $("#liBasket .basketItems").css("visibility", "hidden");

  $(".backSearch").on("click", function() {
    window.location.href =
      "../controller/search_controller.php?depart=" +
      departUrl +
      "&return=" +
      returnUrl +
      "&passengers=" +
      passengersUrl +
      "&price=" +
      priceUrl +
      "";
  });

  /* RULES IF DELETE ITEMS */
  /* $(".coach-div").on("click", function() {
    $(".coach-div-selected").removeClass("coach-div-selected");
    $(this).toggleClass("coach-div-selected");
  }); */
});
