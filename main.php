<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<title>Import CSV in DB</title>
	<?php include_once 'functions.php'; ?>
</head>
<body>

<div class="container">
	<br/>

	<!-- buttons -->
	<div class="col-md-12">
		<button id="extract_csv" type="button" class="btn btn-primary">
			1. Extract CSV from ZIP
		</button>

		<button id="save_csv" type="button" class="btn btn-secondary" disabled>
			2. Save CSV in DB
		</button>
	</div> 
	<br/>

</div>




<script>
$('#extract_csv').click(function() {
	$.ajax({
		type: 'POST',
		url: 'functions.php',
		data: {
			action: 'extract_csv'
		},
		success: function(res) {
			if(res == 'success. csv extracted from zip'){
				alert("CSV extracted with success!\nYou can find it in project's folder.");
				$('#save_csv').prop('disabled', false);
			} else {
				alert(res);
			}
    	},
		error: function(res) { } 
	});
});

$('#save_csv').click(function() {
	$.ajax({
		type: 'POST',
		url: 'functions.php',
		data: {
			action: 'save_csv'
		},
		success: function(res) {
			if(res == 'success. csv saved in db'){
				alert("CSV saved in db with succedd!\nCheck last 5 rows inserted in database.");
				$('#save_csv').prop('disabled', true);
			} else {
				alert(res);
			}
    	},
		error: function(res) { } 
	});
});
</script>

</body>	
</html>

