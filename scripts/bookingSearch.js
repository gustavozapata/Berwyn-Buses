/**
 * function to disallow dates in the past from being selected
 *
 */

$(document).ready(function() {
  var dateFormat = "dd/mm/yy",
    from = $("#from")
      .datepicker({
        dateFormat: "dd/mm/yy",
        minDate: 0,
        format: "LT"
      })
      .on("change", function() {
        to.datepicker("option", "minDate", getDate(this));
      }),
    to = $("#to")
      .datepicker({
        dateFormat: "dd/mm/yy",
        minDate: 0,
        format: "LT"
      })
      .on("change", function() {
        from.datepicker("option", "maxDate", getDate(this));
      });

  expiry = $("#expiry").datepicker({
    dateFormat: "dd/mm/yy",
    minDate: 0,
    format: "LT"
  });

  function getDate(element) {
    var date;
    try {
      date = $.datepicker.parseDate(dateFormat, element.value);
    } catch (error) {
      date = null;
    }
    return date;
  }
});
