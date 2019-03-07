// ADMIN FOOTER
$(".footer-links a")
  .eq(0)
  .replaceWith("<a href='../view/index.php'>Business</a>");

//EDIT COACHES
$(".edit-coaches img").on("click", function() {
  $("#editBg").css("display", "block");

  // AJAX TO POPULATE EDIT POPUP
  var coachId = [
    $(this)
      .parent()
      .parent()
      .find("td:nth-child(1)")
      .text()
  ];
  $.get(
    "../controller/editcoach_controller.php?editCoachId=" + coachId,
    editCoachAjaxResults
  );

  // JQUERY TO POPULATE EDIT POPUP
  /* var objEditValues = {
    regNum: $(this)
      .parent()
      .parent()
      .find("td:nth-child(2)")
      .text(),
    vehicleType: $(this)
      .parent()
      .parent()
      .find("td:nth-child(3)")
      .text(),
    make: $(this)
      .parent()
      .parent()
      .find("td:nth-child(4)")
      .text(),
    colour: $(this)
      .parent()
      .parent()
      .find("td:nth-child(5)")
      .text(),
    capacity: $(this)
      .parent()
      .parent()
      .find("td:nth-child(6)")
      .text(),
    dailyRate: $(this)
      .parent()
      .parent()
      .find("td:nth-child(7)")
      .text()
  };
  populateEditPopup(objEditValues); */
});

// JQUERY TO POPULATE EDIT POPUP
/* function populateEditPopup(obj) {
  $("input[name='editReg']").attr("value", obj.regNum);
  $("select[name='editType'] option[value='" + obj.vehicleType + "']").attr(
    "selected",
    true
  );
  $("input[name='editMake']").attr("value", obj.make);
  $("input[name='editColour']").attr("value", obj.colour);
  $("input[name='editCapacity']").attr("value", obj.capacity);
  $("input[name='editDaily']").attr("value", obj.dailyRate);
} */

// AJAX TO POPULATE EDIT POPUP
function editCoachAjaxResults(results) {
  $("#editPopup h2 span").text(results[0].id);
  $("input[name='editReg']").attr("value", results[0].registrationNumber);
  $("select[name='editType'] option[value='" + results[0].type + "']").attr(
    "selected",
    true
  );
  $("input[name='editMake']").attr("value", results[0].make);
  $("input[name='editColour']").attr("value", results[0].colour);
  $("input[name='editCapacity']").attr("value", results[0].maxCapacity);
  $("input[name='editDaily']").attr("value", results[0].hourlyRate);
}

$("#editPopup img").on("click", function() {
  $("#editBg").css("display", "none");
});

$("#saveEditCoach").on("click", function() {
  $("#editBg").css("display", "none");
});
