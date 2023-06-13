<!DOCTYPE html>
<html>
	<head>
		<title>NBA Results</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>NBA Results</title>
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="main.css">
		<style>
			/* Add CSS styles here */

		</style>
	</head>

	<body>
		<nav class="navbar">
    		<div class="container">
        		<a class="navbar-brand" href="#">
            		<img src="nbaresults.png"
                 		height="150"
                 		alt="NBA Results"
                 		loading="lazy" />
				</a>
			</div>
		</nav>
		<div class="row">
			<div class="col-2"></div>
			<div id="results" class="col-8">
				<?php include "NBAGame.php"; ?>
			</div>
		</div>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
			</script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js">
			</script>
			<script>
				$(document).ready(function () {
    				$('#NBAGame').DataTable({
        				pagingType: 'full_numbers',
    				});
				});
			</script>
</body>
</html>
			