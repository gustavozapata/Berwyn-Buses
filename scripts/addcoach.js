$("#notifyCustomerBtn").on("click", function() {
  $(".coachAddedPopup")
    .find("p:nth-child(3)")
    .text("A notification has been sent to customer and visitors✅");
  $(this).remove();
  $(".coachAddedPopup")
    .find("a")
    .text("OK");
  $(".coachAddedPopup")
    .find("p:nth-child(2)")
    .css("color", "grey");
});
