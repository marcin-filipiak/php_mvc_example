<?php

class LoginController
{
    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processLoginForm();
        } else {
            $this->displayLoginForm();
        }
    }

    private function displayLoginForm()
    {
        include 'views/login.php';
    }

    private function processLoginForm()
    {
        // Weryfikacja danych logowania
        $userName = $_POST['username'];
        $password = $_POST['password'];

	$UserModel = new UserModel();

        // Przykładowa weryfikacja - tutaj powinieneś użyć bezpiecznego logowania
        // np. za pomocą hashowania hasła i sprawdzania w bazie danych.
        if ($UserModel->verifyLogin($userName,$password) == true) {
	    // Ustaw sesję po udanym logowaniu
            session_start();
            $_SESSION['user_id'] = $UserModel->user_id;
	    $_SESSION['user_password'] = $password; 

            // Tutaj możesz przekierować użytkownika na stronę po zalogowaniu
            header('Location: index.php?action=display&page=home');
            exit;
        } else {
            // Błąd logowania, ponowne wyświetlenie formularza z komunikatem
            $errorMessage = 'Nieprawidłowy login lub hasło.';
            include 'views/login.php';
        }
    }
}

