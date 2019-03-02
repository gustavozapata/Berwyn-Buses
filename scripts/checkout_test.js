$(function() {
  isBasketEmpty();

  $("#liBasket .basketItems").css("visibility", "hidden");

  parametersUrl = new URL(document.location).searchParams;
  departUrl = parametersUrl.get("depart");
  returnUrl = parametersUrl.get("return");
  passengersUrl = parametersUrl.get("passengers");

  $("#backSearch").on("click", function() {
    window.location.href =
      "../controller/search_controller.php?depart=" +
      departUrl +
      "&return=" +
      returnUrl +
      "&passengers=" +
      passengersUrl +
      "";
  });

  /* RULES IF DELETE ITEMS */
  /* $(".coach-div").on("click", function() {
    $(".coach-div-selected").removeClass("coach-div-selected");
    $(this).toggleClass("coach-div-selected");
  }); */
});
