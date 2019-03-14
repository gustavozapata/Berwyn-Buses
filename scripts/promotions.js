$(function() {
  $.getJSON("../model/promotions.json", function(result) {
    $.each(result, function(i, row) {
      $(".edit-coaches table").append(
        "<tr><td>" +
          (parseInt(i, 10) + 1) +
          "</td><td>" +
          row.description.substring(0, 14) +
          "..." +
          "</td><td>" +
          row.amount +
          "</td><td>" +
          row.code +
          "</td><td>" +
          row.expiry +
          "</td><td><img src='../content/images/edit.png' alt='Edit Pencil'></td></tr>"
      );
    });
  });
});
