$(document).ready(function(){

	// Listen for a key up event on element
	$('#search').keyup(displaySearchOptions);

});

function displaySearchOptions() {

	// Get the ID of the search
	var userSearch = $(this).val();

	// Prepare AJAX
	$.ajax({
		type:"get",
		url: 'app/search-suggestion.php?search='+userSearch,
		success: function(DataFromServer) {

			// Console log the data taken from server
			console.log(DataFromServer);

			// Clear any unrelated search results
			$('#search-results').html('');

			// Loop through the search results and display them in a datalist
			$(DataFromServer).each(function(i){
				$('#search-results').append('<option value="'+DataFromServer[i]+'">');
			});

		},
		error: function() {
			console.log('cannot connect to server');
		}
	});

}