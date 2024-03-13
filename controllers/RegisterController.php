<?php

class RegisterController
{
    public function handleRequest()
    {
        // Wysłano dane do rejestracji
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $t = $this->processRegisterForm();
		// Rejestracja prawidłowa
		if ($t){
		    // Tutaj możesz przekierować użytkownika na stronę po rejestrowaniu
        	    header('Location: index.php?action=login');
	            exit;
		}
		// Błąd przy rejestracji
		else {
			$this->displayRegisterPage();
		}
        }
	// Jeszcze nie wysłano danych do rejestracji
	else {
		$this->displayRegisterPage();
	}
    }

    // Wyświetlanie strony z form do rejestracji
    private function displayRegisterPage()
    {
        // Wyświetl zawartość strony
        include 'views/register.php';
    }

    // Proces rejestracji
    private function processRegisterForm()
    {
	$userName = $_POST['username'];        
	$password = $_POST['password'];
        $email = $_POST['email'];

        // Przykład zapisu do bazy danych - tutaj powinieneś dostosować do własnych potrzeb
        // i używać zabezpieczeń przed atakami typu SQL Injection.
        $userModel = new UserModel();
        $userModel->register($userName, $password, $email);

        return true;
    }

}

