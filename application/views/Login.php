<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyA1iRB-ICOXZOf1tcj_YxuuD-fSypp5rzw",
    authDomain: "cfg-team10.firebaseapp.com",
    databaseURL: "https://cfg-team10.firebaseio.com",
    projectId: "cfg-team10",
    storageBucket: "",
    messagingSenderId: "547270850669"
  };
  firebase.initializeApp(config);
</script>

<link rel = "stylesheet" type = "text/css"
	href = "<?php echo base_url(); ?>css/login.css">
</head>
<body>
  <form action="doLogin" method="post" class="form">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
		<br><br>
    <button type="submit" value="Submit">Login</button>
  </form>
</body>
</html>
