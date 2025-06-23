<?php

class Sicherheit {

	static function isCorrectNumericalString($str) {
		if (is_numeric($str)) {
			return true;
		}
		return false;
	}
	
	static function istNotEmpty($str) {
	    if ($str!='') {
	        return true;
	    }
	    return false;
	}

	static function isNumericalInBoundary($str, $min, $max) {
		if (is_numeric($str) && floatval($str) >= $min && floatval($str) <= $max) {
			return true;
		}
		return false;
	}

	static function isNumericalMin($str, $min) {
		if (is_numeric($str) && floatval($str) >= $min) {
			return true;
		}
		return false;
	}      


	public static function generateCSRFToken() {
        return bin2hex(random_bytes(64));
    }

    public static function validateCSRFToken($token, $sessionToken) {
        return hash_equals($token, $sessionToken);
    }
	//Überprüft, ob das Passwort mindestens 8 Zeichen lang ist, mindestens eine Zahl, ein Sonderzeichen und einen Großbuchstaben enthält
	public static function validatePassword($password) {
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