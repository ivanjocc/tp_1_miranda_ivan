<?php
// function validerEtChiffrerMotDePasse($motPasse) {
// 	if (strlen($motPasse) < 6 || strlen($motPasse) > 10) {
// 		return "Ça va mal - Le mot de passe doit avoir entre 6 et 10 caractères.";
// 	}

// 	$salt = "atunes";

// 	$motPasseSalted = $motPasse . $salt;

// 	$motPasseEncoded = password_hash($motPasseSalted, PASSWORD_DEFAULT);

// 	$motPasseStocked = $motPasseEncoded;

// 	if (password_verify($motPasseSalted, $motPasseStocked)) {
// 		return "Ça va bien";
// 	} else {
// 		return "Ça va mal";
// 	}
// }
?>