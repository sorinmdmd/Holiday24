<?php

class DbFunctions
{
	public static function connectWithDatabase()
	{
		$link = mysqli_connect('sql7.freesqldatabase.com', 'sql7771264', 'b4BbQQSe5e');
		$query = "USE sql7771264";
		self::executeQuery($link, $query);
		return $link;
	}

	public static function executeQuery($link, $query)
	{
		return mysqli_query($link, $query);
	}

	public static function verifyUser($link, $email, $password)
	{
		$password = trim($password);
		$email = mysqli_real_escape_string($link, $email);
		$query = "SELECT id, role, password_hash FROM customer WHERE email = '$email'";
		$result = self::executeQuery($link, $query);

		if ($result && mysqli_num_rows($result) > 0) {
			$user = mysqli_fetch_assoc($result);
			if (password_verify($password, $user['password_hash'])) {
				echo "Password is valid!";
				return $user;
			} else {
				echo "Input password: " . $password;
				echo "Stored hash: " . $user['password_hash'];
				echo "Password verification failed.";
				$hash = '$2y$10$K8YeRKzxUh.1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJK';
				$password = 'admin';

				if (password_verify($password, $hash)) {
					echo "Password is valid!";
				} else {
					echo "Password is invalid.";
				}
				echo "*****************";
				$hashedPassword = password_hash("customer", PASSWORD_BCRYPT);
				echo $hashedPassword;
			}
		} else {
			echo "No user found with the provided email.";
		}
		return false;
	}
}
?>