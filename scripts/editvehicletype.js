//LOAD COACH TO EDIT
$(".edit-coaches img").on("click", function() {
  $("#editBg").css("display", "block");
  var vehicleId = [
    $(this)
      .parent()
      .parent()
      .find("td:nth-child(1)")
      .text()
  ];
  $.get(
    "../controller/editcoach_controller.php?editVehicleId=" + vehicleId,
    editVehicleAjaxResults
  );
});

var editVehicle = {};
function editVehicleAjaxResults(results) {
  editVehicle = results;
  $("#editPopup h2 span").text(results[0].id);
  $("select[name='editType'] option[value='" + results[0].type + "']").attr(
    "selected",
    true
  );
  $("input[name='editCapacity']").val(results[0].maxCapacity);
  $("input[name='editDaily']").val(results[0].dailyRate);
}

$("#editPopup img").on("click", function() {
  $("#editBg").css("display", "none");
});

$("#saveEditVehicle").on("click", function() {
  $("#editBg").css("display", "none");
});

// SAVE EDIT COACH CHANGES
$("#saveEditVehicle").on("click", function() {
  editVehicle = {
    id: $("#editPopup h2 span").text(),
    type: $("select[name='editType']").val(),
    maxCapacity: $("input[name='editCapacity']").val(),
    dailyRate: $("input[name='editDaily']").val()
  };

  updateEditVehicle();
});

function updateEditVehicle() {
  $("tr#" + editVehicle.id)
    .find("[data-edit='type']")
    .text(editVehicle.type);
  $("tr#" + editVehicle.id)
    .find("[data-edit='max']")
    .text(editVehicle.maxCapacity);
  $("tr#" + editVehicle.id)
    .find("[data-edit='rate']")
    .text("£" + editVehicle.dailyRate);
  editVehicle = JSON.stringify(editVehicle);
  console.log(editVehicle);
  $.get(
    "../controller/editcoach_controller.php?saveEditVehicle=" + editVehicle
  );
}
