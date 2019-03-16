$(function() {
  //LOAD COACH TO EDIT
  $(".edit-coaches img").on("click", function() {
    $("#editBg").css("display", "block");
    var promoId = [
      $(this)
        .parent()
        .parent()
        .find("td:nth-child(1)")
        .text()
    ];
    $.get(
      "../controller/promo_controller.php?editPromoId=" + promoId,
      editPromoAjaxResults
    );
  });

  var editPromo = {};
  function editPromoAjaxResults(results) {
    editPromo = results;
    $("#editPopup h2 span").text(results[0].id);
    $("textarea[name='editDescription']").val(results[0].description);
    $("input[name='editAmount']").attr("value", results[0].amount);
    $("input[name='editCode']").attr("value", results[0].code);
    $("input[name='editExpiry']").attr("value", results[0].expiry);
  }

  $("#editPopup img").on("click", function() {
    $("#editBg").css("display", "none");
  });

  $("#saveEditCoach").on("click", function() {
    $("#editBg").css("display", "none");
  });

  // SAVE EDIT COACH CHANGES
  $("#saveEditCoach").on("click", function() {
    editPromo = {
      id: $("#editPopup h2 span").text(),
      description: $("textarea[name='editDescription']").val(),
      amount: $("input[name='editAmount']").val(),
      code: $("input[name='editCode']").val(),
      expiry: $("input[name='editExpiry']").val()
    };

    updateEditPromo();
  });

  function updateEditPromo() {
    $("tr#" + editPromo.id)
      .find("[data-edit='description']")
      .text(editPromo.description);
    $("tr#" + editPromo.id)
      .find("[data-edit='amount']")
      .text(editPromo.amount);
    $("tr#" + editPromo.id)
      .find("[data-edit='code']")
      .text(editPromo.code);
    $("tr#" + editPromo.id)
      .find("[data-edit='expiry']")
      .text(editPromo.expiry);
    editPromo = JSON.stringify(editPromo);
    $.get("../controller/promo_controller.php?saveEditPromo=" + editPromo);
  }
});
