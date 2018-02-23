<!DOCTYPE html>
<html>
<head>
<title>View Messages</title>
<link rel = "stylesheet" type = "text/css"
	href = "<?php echo base_url() ?>css/message.css">
</head>
<body>
	<table>
		<tr>
			<th>User</th>
			<th>Message</th>
			<th>Time sent</th>
		</tr>
	<?php
	foreach ($results as $row) {
		?>
	  <tr>
		<td><?php echo $row['user_username']?></td>
	    <td><?php echo $row['text']?></td>
		<td><?php echo $row['posted_at']?></td>

	  </tr>
	<?php } ?>

	</table>

	</body>
	</html>
