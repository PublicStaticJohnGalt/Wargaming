<DOCTYPE html>
<html>
<head>

</head>
<body> 
	<form> 
		<p>
			From: 
			<br>
			<input type="number" id="from" name="from" min="1" value="1">
		</p> 
		<p>
			To: 
			<br>
			<input type="number" id="to" name="to" min="1" value="1">
		</p> 
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
	
	<div id="result"></div>

	<script src="asset/js/jquery.js"></script>
	<script>
		$(document).on('submit', 'form', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'GET',
				url: 'fibonacci',
				dataType: 'json',
				data: {
					from: $('#from').val(),
					to: $('#to').val(),
				},
				success: function(data) {
					$('#result').text(data.fib);
				},
			});
		});
	</script>
</body>
</html> 