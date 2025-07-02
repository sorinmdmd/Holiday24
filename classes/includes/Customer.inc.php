<?php
/**
 * Customer.inc.php
 * 
 * Kundenmanagement-Klasse für das Holiday24 Reisebüro-System
 * Diese Klasse verwaltet alle kundenbezogenen Operationen wie Registrierung,
 * Authentifizierung, Benutzerverwaltung und Datenbankoperationen.
 * 
 * Hauptfunktionen:
 * - Benutzerregistrierung mit sicherer Passwort-Verschlüsselung
 * - Benutzerauthentifizierung und -verifikation
 * - E-Mail-Duplikatsprüfung
 * - UUID-Generierung für eindeutige Benutzer-IDs
 * - Benutzerverwaltung (Löschen, Abrufen)
 */
class Customer
{

	/**
	 * Verifiziert Benutzeranmeldedaten (Login-Funktion)
	 * 
	 * Diese Methode überprüft die Anmeldedaten eines Benutzers gegen die Datenbank.
	 * Sie verwendet sichere Passwort-Verifikation mit bcrypt-Hashes.
	 * 
	 * Sicherheitsfeatures:
	 * - SQL-Injection-Schutz durch mysqli_real_escape_string
	 * - Sichere Passwort-Verifikation mit password_verify()
	 * - Detailliertes Error-Logging für Debugging
	 */
	public static function verifyUserLogin($link, $email, $password)
	{
		// Entfernen von Leerzeichen am Anfang und Ende des Passworts
		$password = trim($password);

		// Schutz vor SQL-Injection durch Escaping der E-Mail
		$email = mysqli_real_escape_string($link, $email);

		// SQL-Abfrage: Hole Benutzerinformationen basierend auf E-Mail
		$query = "SELECT id, role, password_hash FROM customer WHERE email = '$email'";
		$result = DbFunctions::executeQuery($link, $query);

		// Prüfen ob Benutzer in der Datenbank existiert
		if ($result && mysqli_num_rows($result) > 0) {
			// Benutzerdaten aus der Datenbank abrufen
			$user = mysqli_fetch_assoc($result);

			// Sichere Passwort-Verifikation mit bcrypt
			if (password_verify($password, $user['password_hash'])) {
				// Login erfolgreich - Benutzerdaten zurückgeben
				return $user;
			} else {
				// Login fehlgeschlagen - Detailliertes Error-Logging
				error_log("Password verification failed for email: $email");
				error_log("Input password: $password");
				error_log("Stored hash: " . $user['password_hash']);
				return false;
			}
		} else {
			// Benutzer nicht gefunden - Error-Logging
			error_log("No user found with the provided email: $email");
		}

		// Standardrückgabe bei Fehler
		return false;
	}

	public static function verifyUser($link, $userid)
	{
		$query = "UPDATE customer SET verified = 1 WHERE id = ?";

		$stmt = $link->prepare($query);

		if ($stmt) {
			$stmt->bind_param("s", $userid);
			$stmt->execute();
			$stmt->close();
		} else {
			error_log("Error preparing statement: " . $link->error);
		}
	}


	/**
	 * Registriert einen neuen Benutzer im System
	 * 
	 * Diese Methode erstellt einen neuen Kundeneintrag in der Datenbank mit
	 * sicherer Passwort-Verschlüsselung und automatischer ID-Generierung.
	 * 
	 * Sicherheitsfeatures:
	 * - Automatische UUID-Generierung für eindeutige Benutzer-IDs
	 * - Sichere Passwort-Verschlüsselung mit bcrypt
	 * - Prepared Statements zum Schutz vor SQL-Injection
	 * - Standardrolle 'customer' wird automatisch zugewiesen
	 */
	public static function registerUser($link, $firstName, $lastName, $email, $password)
	{
		// Generierung einer eindeutigen UUID für den neuen Benutzer
		$id = self::generateID();

		// Sichere Passwort-Verschlüsselung mit bcrypt-Algorithmus
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);

		// SQL-Insert mit Prepared Statement für maximale Sicherheit
		$query = "INSERT INTO customer (id, first_name, last_name, email, password_hash, role) VALUES (?, ?, ?, ?, ?, 'customer')";
		$stmt = mysqli_prepare($link, $query);

		// Parameter an das Prepared Statement binden (alle als Strings)
		mysqli_stmt_bind_param($stmt, 'sssss', $id, $firstName, $lastName, $email, $passwordHash);

		// SQL-Statement ausführen und Ergebnis zurückgeben
		return mysqli_stmt_execute($stmt);
	}

	/**
	 * Überprüft ob eine E-Mail-Adresse bereits in der Datenbank existiert
	 * 
	 * Diese Methode wird typischerweise vor der Registrierung verwendet,
	 * um E-Mail-Duplikate zu vermeiden und eindeutige Benutzerkonten sicherzustellen.
	 *
	 * Performance-Optimierungen:
	 * - SELECT 1 statt SELECT * für bessere Performance
	 * - LIMIT 1 für frühzeitigen Abbruch bei erstem Treffer
	 * - Prepared Statement für Sicherheit
	 */
	public static function emailExists($link, $email): bool
	{
		// Effiziente Abfrage: SELECT 1 ist schneller als SELECT *
		$query = "SELECT 1 FROM customer WHERE email = ? LIMIT 1";
		$stmt = mysqli_prepare($link, $query);

		// E-Mail-Parameter binden
		mysqli_stmt_bind_param($stmt, 's', $email);

		// Statement ausführen
		mysqli_stmt_execute($stmt);

		// Ergebnis im Speicher laden für Zählung
		mysqli_stmt_store_result($stmt);

		// Rückgabe: True wenn mindestens ein Datensatz gefunden wurde
		return mysqli_stmt_num_rows($stmt) > 0;
	}

	/**
	 * Generiert eine eindeutige UUID (Universally Unique Identifier)
	 * 
	 * Diese Methode erstellt eine UUID nach RFC 4122 Standard.
	 * Die UUID wird als primärer Schlüssel für neue Benutzer verwendet.
	 * 
	 * 
	 * UUID-Struktur:
	 * - 32 Hexadezimalzeichen
	 * - Aufgeteilt in 5 Gruppen durch Bindestriche
	 * - Version 4 (zufällig generiert)
	 * - Kryptographisch sicher durch random_int()
	 */
	public static function generateID(): string
	{
		// UUID Version 4 Generierung nach RFC 4122
		return sprintf(
			// UUID-Format: 8-4-4-4-12 Zeichen
			'%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			// Erste 32 Bits (8 Hex-Zeichen)
			random_int(0, 0xffff),
			random_int(0, 0xffff),
			// Nächste 16 Bits (4 Hex-Zeichen)
			random_int(0, 0xffff),
			// Version 4 kennzeichnen: 4xxx (4 Hex-Zeichen)
			random_int(0, 0x0fff) | 0x4000,
			// Variant kennzeichnen: yxxx (4 Hex-Zeichen)
			random_int(0, 0x3fff) | 0x8000,
			// Letzte 48 Bits (12 Hex-Zeichen)
			random_int(0, 0xffff),
			random_int(0, 0xffff),
			random_int(0, 0xffff)
		);
	}

	// Ruft die ID des ersten Benutzers aus der Datenbank ab
	public static function getUserId($link)
	{
		// WARNUNG: Diese Abfrage gibt nur den ersten Benutzer zurück
		$query = "SELECT id FROM customer";
		$result = DbFunctions::executeQuery($link, $query);

		// Erste Zeile abrufen (wenn vorhanden)
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['id'];
		}

		// Kein Benutzer gefunden
		return null;
	}

	public static function getUserById($link, $userId)
	{
		$query = "SELECT * FROM customer WHERE id = '" . mysqli_real_escape_string($link, $userId) . "'";
		return DbFunctions::getRows($link, $query);
	}

	public static function getUserDetails($link)
	{
		$query = "SELECT *
                      FROM customer";
		return DbFunctions::getRows($link, $query);
	}

	// Löscht einen Benutzer aus der Datenbank
	public static function deleteUser($link, $userId)
	{
		// Delegation an DbFunctions-Klasse für die eigentliche Löschoperation
		return DbFunctions::deleteUser($link, $userId);
	}
}
?>