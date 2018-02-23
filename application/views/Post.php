<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
	<link rel = "stylesheet" type = "text/css"
		href = "<?php echo base_url(); ?>css/post.css">
</head>
<body>
	<br><br>
	<h1>Post a message.</h1>
	<br>
		<form action="Message/doPost" method="post">
			<!-- Post Message: <input type="text" name="message" placeholder="message"> -->
			<textarea placeholder="Please enter your message here." name="message"></textarea>
			<br><br>
			<button type="submit" value="Submit">Post</button>
		</form>
	</body>
	</html>
