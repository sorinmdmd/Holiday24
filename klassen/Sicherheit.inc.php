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
	
	static function isCorrectWinterart($str) {
	    if ($str == 'mild' || $str == 'normal' || $str == 'streng'||$str=='sehr streng') {
	        return true;
	    }
	    return false;
	}
	            	
}
?>