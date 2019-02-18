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

	if (datefield.type != "date")
	{
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
	}
	else if (datefield.type == 'date')
	{
		if (day <10){
			day = '0' + day.toString();
		}
		if (month <10){
			month = '0' + month.toString();
		}

		var maxDate = year + '-' + month + '-' + day;
		$('#departureDate').val(maxDate);
		$('#departureDate').attr('min', maxDate);
		$('#returnDate').attr('min', maxDate);
	}
});

function setReturnMin()
{
	returnDateMin = $('#departureDate').val();
	$('#returnDate').attr('min', returnDateMin);
}