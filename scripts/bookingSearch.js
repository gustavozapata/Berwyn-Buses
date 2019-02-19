/**
 * function to disallow dates in the past from being selected
 * 
 */

 $(document).ready(function()
 {
	var todaysDate = new Date();

	var month = todaysDate.getMonth() +1;
	var day = todaysDate.getDate();
	var year = todaysDate.getFullYear();

	var datefield = document.createElement("input")
	datefield.setAttribute("type", "date")
	$('#departureDate').attr('type', 'text');
	$('#returnDate').attr('type', 'text')

	$('#departureDate').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: 0,
		format: 'LT'
	});
	$('#returnDate').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: 0,
		format: 'LT'
	});
});

function setReturnMin()
{
	returnDateMin = $('#departureDate').val();
	$('#returnDate').attr('min', returnDateMin);
}