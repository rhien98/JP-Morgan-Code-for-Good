<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<link rel = "stylesheet" type = "text/css"
	href = "<?php echo base_url() ?>css/search.css">
</head>
	<h1>Search a message.</h1>
	<br><br>
			<form id="entryform" action="Search/doSearch" method="get">
				<input type="text" class="search" name="search" placeholder="Please enter text here.">
				<input type="submit" value="Submit" class="button">
			</form>
	</body>
	</html>
