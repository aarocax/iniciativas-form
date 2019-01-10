<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>formulario iniciativas</title>
	<link rel="stylesheet" href="">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

	<?php
		session_start();
		$token = md5(mt_rand(11,99999));
		$_SESSION['token'] = $token;
	?>	

	<h1>formulario</h1>

	<form id="subscrition-form" method="POST" action="#">
    <p>
    	<label>Email</label>
	    <input type="text" name="email" maxlength="75" value="" required>
	    <div id="error" class="error"></div>
    </p>
    <p><input type="checkbox" name="terms" required> I accept the <u>Terms and Conditions</u></p>
    <input type="hidden" name="token" value="<?php echo $token; ?>">
    <div class="g-recaptcha" data-sitekey="6LccORsTAAAAAJJLxFpHhFuUH3cG_enKLzN7tZvj"></div>
    <input type="submit" value="enviar">
  </form>
  <div id="results"></div>




	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 			  crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>