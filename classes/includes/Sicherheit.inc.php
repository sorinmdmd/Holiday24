<?php

class Sicherheit
{
	//Überprüft, ob das Passwort mindestens 8 Zeichen lang ist, mindestens eine Zahl, ein Sonderzeichen und einen Großbuchstaben enthält
	public static function validatePassword($password)
	{
		if (strlen($password) >= 8) {
			if (preg_match('/\d/', $password)) {
				if (preg_match('/[\W_]/', $password)) {
					if (preg_match('/[A-Z]/', $password)) {
						return true;
					}
				}
			}
		}
		return false;
	}
}
?>