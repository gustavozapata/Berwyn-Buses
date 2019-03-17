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
      "&reset=1";
  });

  $("#clearBasket a").on("click", function() {
    $.get(
      "../controller/checkout_test_controller.php?clearBasket=0",
      clearBasket
    );
  });

  function clearBasket() {
    window.location.href = "../controller/checkout_test_controller.php";
  }

  /* RULES IF DELETE ITEMS */
  /* $(".coach-div").on("click", function() {
    $(".coach-div-selected").removeClass("coach-div-selected");
    $(this).toggleClass("coach-div-selected");
  }); */
});
