// This loads everything on the browser (HTML, CSS) and then runs jQuery
$('document').ready(function(){

	// Listen for changes on the select element
	$('#customer').change(getCustomerInfo);

});

function getCustomerInfo() {
		
	// Save the ID of the chosen customer
	var custID = $(this).val();

	// Make sure the value is a number
	// isNaN means is Not a Number
	if( isNaN(custID) ) {
		return;
	}

	// Prepare AJAX
	$.ajax({

		url: 'app/get-customer-info.php',
		data: {
			customerID: custID
		},
		success: function(dataFromServer){
			alert(dataFromServer);
		},
		error: function() {
			console.log('cannot connect to server');
		}
	});

}