<?php

class DeleteController
{
    public function handleRequest()
    {
        // Sprawdź, czy użytkownik jest zalogowany (to tylko przykład)
        // W rzeczywistości, zazwyczaj używałbyś bardziej zaawansowanej autentykacji.
        $isLoggedIn = $this->checkUserAuthentication();

        if ($isLoggedIn == "1") {
		// Pobierz parametr 'page' z URL, który zawiera nazwę strony
	        $pageUrl = isset($_GET['page']) ? $_GET['page'] : '';	
	        // Pobierz treść strony z bazy danych na podstawie nazwy strony
	        $pageModel = new PageModel();
	        $pageBody = $pageModel->deletePage($pageUrl, $_SESSION['user_id']);
		header('Location: index.php?action=list');
            	exit;
        } else {
            // Przekieruj na stronę logowania, jeśli użytkownik nie jest zalogowany
            header('Location: index.php?action=login');
            exit;
        }
    }

    private function checkUserAuthentication()
    {
        // Przykład - sprawdzanie, czy użytkownik jest zalogowany
        // W rzeczywistości używałbyś bardziej zaawansowanych metod autentykacji.
	session_start();
        return isset($_SESSION['user_id']);
    }
}

