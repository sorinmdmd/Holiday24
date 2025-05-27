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

	public static function generateID(): String {
		return sprintf(
			'%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			random_int(0, 0xffff), random_int(0, 0xffff),
			random_int(0, 0xffff),
			random_int(0, 0x0fff) | 0x4000,
			random_int(0, 0x3fff) | 0x8000,
			random_int(0, 0xffff), random_int(0, 0xffff), random_int(0, 0xffff)
		);
	}

    public static function getUserId($link) {
		$query = "SELECT id FROM customer"; 
   	 	$result = DbFunctions::executeQuery($link, $query);

    	if ($row = mysqli_fetch_assoc($result)) {
        	return $row['id']; 
    	}
    	return null;
	}

	public static function deleteUser($link, $userId) {
       
        $userId = mysqli_real_escape_string($link, $userId);    
        $query = "DELETE FROM customer WHERE id = '$userId'";
        $result = DbFunctions::executeQuery($link, $query);

        if ($result && mysqli_affected_rows($link) > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    public static function getUserDetails($link)
    {
        $query = "SELECT *
                      FROM customer";
        return DbFunctions::getRows($link, $query);
    }

    public static function getUserById($link, $userId)
    {
        $query = "SELECT * FROM customer WHERE id = '" . mysqli_real_escape_string($link, $userId) . "'";
        return DbFunctions::getRows($link, $query);
    } 
}

?>