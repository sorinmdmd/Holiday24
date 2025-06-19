<?php
class Customer
{

	public static function verifyUser($link, $email, $password)
	{
		$password = trim($password);
		$email = mysqli_real_escape_string($link, $email);
		$query = "SELECT id, role, password_hash FROM customer WHERE email = '$email'";
		$result = DbFunctions::executeQuery($link, $query);

		if ($result && mysqli_num_rows($result) > 0) {
			$user = mysqli_fetch_assoc($result);

			if (password_verify($password, $user['password_hash'])) {
				return $user;
			} else {
				error_log("Password verification failed for email: $email");
				error_log("Input password: $password");
				error_log("Stored hash: " . $user['password_hash']);
				return false;
			}
		} else {
			error_log("No user found with the provided email: $email");
		}

		return false;
	}


	public static function registerUser($link, $firstName, $lastName, $email, $password)
	{
		$id = self::generateID();

		$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		$query = "INSERT INTO customer (id, first_name, last_name, email, password_hash, role) VALUES (?, ?, ?, ?, ?, 'customer')";
		$stmt = mysqli_prepare($link, $query);
		mysqli_stmt_bind_param($stmt, 'sssss', $id, $firstName, $lastName, $email, $passwordHash);

		return mysqli_stmt_execute($stmt);
	}
	public static function emailExists($link, $email): bool
	{
		$query = "SELECT 1 FROM customer WHERE email = ? LIMIT 1";
		$stmt = mysqli_prepare($link, $query);
		mysqli_stmt_bind_param($stmt, 's', $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);

		return mysqli_stmt_num_rows($stmt) > 0;
	}

	public static function generateID(): string
	{
		return sprintf(
			'%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			random_int(0, 0xffff),
			random_int(0, 0xffff),
			random_int(0, 0xffff),
			random_int(0, 0x0fff) | 0x4000,
			random_int(0, 0x3fff) | 0x8000,
			random_int(0, 0xffff),
			random_int(0, 0xffff),
			random_int(0, 0xffff)
		);
	}

	public static function getUserId($link)
	{
		$query = "SELECT id FROM customer";
		$result = DbFunctions::executeQuery($link, $query);

		if ($row = mysqli_fetch_assoc($result)) {
			return $row['id'];
		}
		return null;
	}

	public static function deleteUser($link, $userId)
	{
		return DbFunctions::deleteUser($link, $userId);
	}
}
?>