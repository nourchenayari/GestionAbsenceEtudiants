<?php
session_start();
require_once 'user.php';
$user = new user('', '', '');
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login !== "" && $password !== "") {
        $personne->authentication($login, $password);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/login.css">
	<title>Connexion</title>
</head>
<body>
	     
   
	<div class="container" id="container">
		
		<div class="form-container log-in-container">
			<form action="verification.php" method="post">
			
				<h1>Connexion</h1>
				<div class="social-container">
		</div>
        <label for="username">ID:</label>
        <input type="text" id="username" name="iduser" autocomplete="off" required>
        <br>
        <label for="password">Mot De Passe:</label>
        <input type="password" id="password" name="passe" autocomplete="off" required>
        <br><br>
        <input type="submit" value="Login" name="submit">
			</form>
	</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<img src="../image/img-1.png"></div>
                				
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</html>
