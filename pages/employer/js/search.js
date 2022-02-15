$(document).ready(function() {
   $("#search").keyup(function() {
		var name = $('#search').val();
		if (name == "") {
			$("#result").html("");
		}
		else {
			$.ajax({
			type: "POST",
			url: "search.php",
			data: {
				search: name
			},
			success: function(html) {
				$("#result").html(html).show();
			}
			});
		}
	});
 });

function fill(Value) {
	$('#search').val(Value);
	$('#result').hide();
}