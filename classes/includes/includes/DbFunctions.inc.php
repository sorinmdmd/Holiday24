<?php

class DbFunctions
{
	public static function connectWithDatabase()
	{
		$link = mysqli_connect('pav050.hs-bochum.de', 'iksy2_holiday24', 'rfQJY/]cDIfCxxd/');
		$query = "USE iksy2_holiday24";
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
				$hashedPassword = password_hash("customer", PASSWORD_BCRYPT);
				echo $hashedPassword;
			}
		} else {
			echo "<script>console.log('No user found with the provided email');</script>";
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

	public static function getHash($link, $query)
	{
		$result = self::executeQuery($link, $query);
		$countRows = mysqli_num_rows($result);
		if ($countRows == 0) {
			return null;
		}
		$fieldList = array();
		for ($i = 0; $i < $countRows; $i++) {
			$row = mysqli_fetch_row($result);
			$fieldList[$row[0]] = $row[1];
		}
		mysqli_free_result($result);
		return $fieldList;
	}

	public static function getRows($link, $query)
	{
		$result = self::executeQuery($link, $query);
		$rows = [];

		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	public static function getUserId($link)
	{
		$query = "SELECT id FROM customer";
		$result = self::executeQuery($link, $query);

		if ($row = mysqli_fetch_assoc($result)) {
			return $row['id'];
		}
		return null;
	}

	public static function deleteUser($link, $userId)
	{
		$userId = mysqli_real_escape_string($link, $userId);

		mysqli_begin_transaction($link);

		try {
			$deleteBookingsQuery = "DELETE FROM booking WHERE customerid = '$userId'";
			$resultBookings = self::executeQuery($link, $deleteBookingsQuery);

			if (!$resultBookings) {
				throw new Exception("Failed to delete bookings: " . mysqli_error($link));
			}

			$deleteCustomerQuery = "DELETE FROM customer WHERE id = '$userId'";
			$resultCustomer = self::executeQuery($link, $deleteCustomerQuery);

			if (!$resultCustomer) {
				throw new Exception("Failed to delete customer: " . mysqli_error($link));
			}

			mysqli_commit($link);
			return true;
		} catch (Exception $e) {
			mysqli_rollback($link);
			error_log("Error deleting user and bookings: " . $e->getMessage()); // Log the error for debugging
			return false;
		}
	}

	public static function getUserIDbyEmail($link, $email)
	{
		$query = "SELECT id FROM customer WHERE email = ?";
		$stmt = mysqli_prepare($link, $query);
		mysqli_stmt_bind_param($stmt, 's', $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $user_id);

		if (mysqli_stmt_fetch($stmt)) {
			return $user_id; 
		} else {
			return null; 
		}
	}
		
	public static function updatePassword($link, $email, $password)
	{
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);

		$query = "UPDATE customer SET password_hash = ? WHERE email = ?";
		$stmt = mysqli_prepare($link, $query);
		
		if (!$stmt) {
			echo "Prepare failed: " . mysqli_error($link);
			return false;
		}

		mysqli_stmt_bind_param($stmt, 'ss', $passwordHash, $email);

		return mysqli_stmt_execute($stmt);
	}



	public static function getFirstFieldOfResult($link, $query)
	{
		$result = self::executeQuery($link, $query);
		if (mysqli_num_rows($result) == 0) {
			return null;
		}
		$row = mysqli_fetch_row($result);
		mysqli_free_result($result);
		return ($row[0]);
	}
	public static function createTravelBundle($link, $hotelid, $city, $spaces, $price, $start, $end, $img_path)
	{
		$sql = "INSERT INTO travelbundles (hotelid, city, available_spaces, price, start_date, end_date, img_path)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($link, $sql);
		if (!$stmt)
			return false;

		mysqli_stmt_bind_param($stmt, 'isidsss', $hotelid, $city, $spaces, $price, $start, $end, $img_path);
		return mysqli_stmt_execute($stmt);
	}

}
?>