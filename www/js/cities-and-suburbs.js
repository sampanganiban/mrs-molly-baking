$(document).ready(function(){

	// Listen for a change in the select element
	$('#city').change(showSuburbs);

});

function showSuburbs() {

	// Get the ID of the city
	var userCityID = $(this).val();

	// If what they selected was not a number
	if(isNaN(userCityID)) {
		return;
	}

	// Prepare AJAX, curly brackets create JSON
	$.ajax({
		type: 'get',
		// If it is small bits of data, concatenate it to the url
		url: 'app/cities-and-suburbs.php?cityID='+userCityID,
		success: function(DataFromServer) {

			// Console log the data taken from server
			console.log(DataFromServer);

			// Clear suburbs for each city
			$('#suburb').html('');

			// JavaScript for loop
			for( var i = 0; i < DataFromServer.length; i++ ) {

				// Create an option element
				var option = $('<option>');

				// Insert the suburb text into it
				$(option).html(DataFromServer[i]);

				// Add this option to the select element
				$('#suburb').append(option);

			}

			// jQuery for loop

			// $(DataFromServer).each(function(i){

			// 	// Clear the suburbs for each city
			// 	$('#suburb').html('');

			// 	// Create an option element
			// 	var option = $('<option>');

			// 	// Insert the suburb text into it
			// 	$(option).html(DataFromServer[i]);

			// 	// Add this option to the select element
			// 	$('#suburb').append(option);
			
			// });


		},
		error: function() {
			console.log('cannot connect to server');
		}

	});
















}