<?php

class DisplayController
{
    public function handleRequest()
    {
        $isLoggedIn = $this->checkUserAuthentication();

        if ($isLoggedIn == "1") {
		// Pobierz parametr 'page' z URL, który zawiera nazwę strony
		$pageUrl = isset($_GET['page']) ? $_GET['page'] : '';

		// Pobierz treść strony z bazy danych na podstawie nazwy strony
		$pageModel = new PageModel();
		$pageBody = $pageModel->getPageContent($pageUrl);

		if (!empty($pageBody)) {
		    $this->displayPage($pageBody);
		} else {
		    // Strona nie istnieje, możesz obsłużyć to odpowiednio
		    $this->displayErrorPage();
		}
	}
	else {
            // Przekieruj na stronę logowania, jeśli użytkownik nie jest zalogowany
            header('Location: index.php?action=login');
            exit;
	}
    }

    private function displayPage($pageBody)
    {
        // Wyświetl zawartość strony
        include 'views/display.php';
    }

    private function displayErrorPage()
    {
        // Wyświetl stronę błędu
        echo "Strona nie istnieje.";
    }

    private function checkUserAuthentication()
    {
        // Przykład - sprawdzanie, czy użytkownik jest zalogowany
        // W rzeczywistości używałbyś bardziej zaawansowanych metod autentykacji.
	session_start();
        return isset($_SESSION['user_id']);
    }
}

