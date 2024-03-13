<?php

class UserModel
{

    public $user_id = 0;

    // Przykładowa metoda do weryfikacji danych logowania
    public function verifyLogin($username, $password)
    {
	    $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	    // Pobierz hasło i sól z bazy danych na podstawie nazwy użytkownika
	    $sql = "SELECT `user_id`, `password`, `salt` FROM `user` WHERE `username` = '$username'";
	    $result = $db->query($sql);

	    if ($result && $row = $result->fetch_assoc()) {
		$storedPassword = $row['password'];
		$salt = $row['salt'];

		// Sprawdź, czy hasło jest poprawne przy użyciu funkcji password_verify
		if (password_verify($password . $salt, $storedPassword)){
			$this->user_id = $row['user_id'];
			return true;
		}
		else {
			return false;
		}
	    }

	    return false;
    }

    public function register($userName, $password, $email)
    {
	$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// Sól to losowy ciąg znaków, który jest dodawany do hasła przed haszowaniem
	$salt = bin2hex(random_bytes(32));

	// Haszuj hasło z dodaną solą
	$hashedPassword = password_hash($password . $salt, PASSWORD_BCRYPT);

	$sql = "INSERT INTO `user`(`username`, `password`, `email`, `salt`) 
		VALUES ('$userName','$hashedPassword','$email','$salt')";

	$db->query($sql);
	$db->closeConnection();
    }



}

?>

