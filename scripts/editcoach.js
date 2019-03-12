//LOAD COACH TO EDIT
$(".edit-coaches img").on("click", function() {
  $("#editBg").css("display", "block");
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
});

var editCoach = {};
function editCoachAjaxResults(results) {
  editCoach = results;
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

// SAVE EDIT COACH CHANGES
$("#saveEditCoach").on("click", function() {
  editCoach = {
    id: $("#editPopup h2 span").text(),
    registrationNumber: $("input[name='editReg']").val(),
    type: $("select[name='editType']").val(),
    make: $("input[name='editMake']").val(),
    colour: $("input[name='editColour']").val(),
    maxCapacity: $("input[name='editCapacity']").val(),
    dailyRate: $("input[name='editDaily']").val()
  };

  updateEditCoach();
});

function updateEditCoach(){
  $("tr#"+editCoach.id).find("[data-edit='reg']").text(editCoach.registrationNumber);
  // $("tr#"+editCoach.id).find("[data-edit='type']").text(editCoach.type);
  $("tr#"+editCoach.id).find("[data-edit='make']").text(editCoach.make);
  $("tr#"+editCoach.id).find("[data-edit='colour']").text(editCoach.colour);
  $("tr#"+editCoach.id).find("[data-edit='max']").text(editCoach.maxCapacity);
  $("tr#"+editCoach.id).find("[data-edit='rate']").text("£"+editCoach.dailyRate);
  editCoach = JSON.stringify(editCoach);
  $.get("../controller/editcoach_controller.php?saveEditCoach=" + editCoach);
}
