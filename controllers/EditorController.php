<?php

class EditorController
{
    public function handleRequest()
    {
        // Sprawdź, czy użytkownik jest zalogowany (to tylko przykład)
        // W rzeczywistości, zazwyczaj używałbyś bardziej zaawansowanej autentykacji.
        $isLoggedIn = $this->checkUserAuthentication();

        if ($isLoggedIn == "1") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->processEditorForm();
            } else {
		// Pobierz parametr 'page' z URL, który zawiera nazwę strony
	        $pageUrl = isset($_GET['page']) ? $_GET['page'] : '';	
	        // Pobierz treść strony z bazy danych na podstawie nazwy strony
	        $pageModel = new PageModel();
	        $pageBody = $pageModel->getPageContent($pageUrl);
		
		if (empty($pageBody)){
			$pageBody['page_id'] = "";
			$pageBody['page_title'] = "";
			$pageBody['page_content'] = "";
		}

                $this->displayEditorForm($pageBody);
            }
        } else {
            // Przekieruj na stronę logowania, jeśli użytkownik nie jest zalogowany
            header('Location: index.php?action=login');
            exit;
        }
    }

    private function displayEditorForm($pageBody)
    {
        include 'views/editor.php';
    }

    private function processEditorForm()
    {
        // Przetwarzanie danych z formularza edytora, np. zapis do bazy danych
	$pageId = $_POST['pageId'];        
	$pageTitle = $_POST['pageTitle'];
        $pageContent = $_POST['pageContent'];

        // Przykład zapisu do bazy danych - tutaj powinieneś dostosować do własnych potrzeb
        // i używać zabezpieczeń przed atakami typu SQL Injection.
        $pageModel = new PageModel();
        $pageModel->savePage($pageId, $pageTitle, $pageContent, $_SESSION['user_id']);

        // Przekieruj na stronę wyświetlania
        header('Location: index.php?action=display&page=' . $pageModel->generateUrlKey($pageTitle));
        exit;
    }

    private function checkUserAuthentication()
    {
        // Przykład - sprawdzanie, czy użytkownik jest zalogowany
        // W rzeczywistości używałbyś bardziej zaawansowanych metod autentykacji.
	session_start();
        return isset($_SESSION['user_id']);
    }
}

