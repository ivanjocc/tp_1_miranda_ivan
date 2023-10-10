<!DOCTYPE html>
<html>

<head>
	<title>Check password</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			margin-bottom: 20px;
		}

		#form {
			background-color: #ffffff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
			text-align: center;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type="password"] {
			width: 90%;
			padding: 10px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #0056b3;
		}

		img {
			width: 200px;
			margin-bottom: 20px;
			border-radius: 20px;
		}

		p {
			color: red;
			font-weight: bold;
		}
	</style>
</head>

<body>
	<div id="form">
		<img src="./img/gato.avif" alt="Logo" />
		<h1>Check password</h1>

		<?php
		function validerEtChiffrerMotDePasse($motPasse)
		{
			if (strlen($motPasse) < 6 || strlen($motPasse) > 10) {
				return "Ça va mal - Le mot de passe doit avoir entre 6 et 10 caractères.";
			}

			$salt = "atunes";

			$motPasseSalted = $motPasse . $salt;

			$motPasseEncoded = password_hash($motPasseSalted, PASSWORD_DEFAULT);

			$motPasseStocked = $motPasseEncoded;

			if (password_verify($motPasseSalted, $motPasseStocked)) {
				return "Ça va bien";
			} else {
				return "Ça va mal";
			}
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$password = $_POST["password"];

			$message = validerEtChiffrerMotDePasse($password);

			echo "<p>$message</p>";
		}
		// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 	$password = $_POST["password"];

		// 	$message = validerEtChiffrerMotDePasse($password);

		// 	// Mostrar la contraseña codificada si el mensaje es "Mot de passe correct !"
		// 	if ($message === "Mot de passe correct !") {
		// 		$hashedPassword = password_hash($password . "atunes", PASSWORD_DEFAULT);
		// 		echo "<p>Contraseña codificada: $hashedPassword</p>";
		// 	}

		// 	echo "<p>$message</p>";
		// }
		?>

		<form method="post">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" autocomplete="off" required>
			<br>
			<input type="submit" value="Check password">
		</form>
	</div>
</body>

</html>