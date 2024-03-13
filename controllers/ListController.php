<?php

class ListController
{
    public function handleRequest()
    {
        $isLoggedIn = $this->checkUserAuthentication();

        if ($isLoggedIn == "1") {
		// Pobierz treść strony z bazy danych na podstawie nazwy strony
		$pageModel = new PageModel();
		$pageList = $pageModel->getPageList();

		if (!empty($pageList)) {
		    $this->displayPage($pageList);
		} 
	}
	else {
            // Przekieruj na stronę logowania, jeśli użytkownik nie jest zalogowany
            header('Location: index.php?action=login');
            exit;
        }
    }

    private function displayPage($pageList)
    {
        // Wyświetl zawartość strony
        include 'views/list.php';
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
?>
