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
// LA60 FCB	Volvo	White
var editCoach = {};
function editCoachAjaxResults(results) {
  editCoach = results;
  $("#editPopup h2 span").text(results[0].id);
  $("input[name='editReg']").attr("value", results[0].registrationNumber);
  $("input[name='editMake']").attr("value", results[0].make);
  $("input[name='editColour']").attr("value", results[0].colour);
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
    make: $("input[name='editMake']").val(),
    colour: $("input[name='editColour']").val()
  };

  updateEditCoach();
});

function updateEditCoach() {
  $("tr#" + editCoach.id)
    .find("[data-edit='reg']")
    .text(editCoach.registrationNumber);
  $("tr#" + editCoach.id)
    .find("[data-edit='make']")
    .text(editCoach.make);
  $("tr#" + editCoach.id)
    .find("[data-edit='colour']")
    .text(editCoach.colour);
  editCoach = JSON.stringify(editCoach);
  $.get("../controller/editcoach_controller.php?saveEditCoach=" + editCoach);
}
