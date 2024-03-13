<?php

class PageModel
{

    public function generateUrlKey($title) {
	    // Zamień polskie znaki na angielskie
	    $title = strtr($title, 'ąćęłńóśźżĄĆĘŁŃÓŚŹŻ', 'acelnoszzACELNOSZZ');

	    // Zamień spacje na podkreślenia
	    $title = str_replace(' ', '_', $title);

	    // Zamień wszystkie znaki na małe litery
	    $title = strtolower($title);

	    // Usuń wszystkie znaki specjalne i pozostaw tylko litery, cyfry, podkreślenia
	    $title = preg_replace('/[^a-z0-9_]/', '', $title);

            // Usuń znaki na końcu: spacja, enter, znak zapytania, wykrzyknik, kropka
            $title = rtrim($title, " \n\r\t?!."); 

	    return $title;
    }

    // Przykładowa metoda do zapisu strony do bazy danych
    public function savePage($pageId, $pageTitle, $pageContent, $userId)
    {

	$pageUrl = $this->generateUrlKey($pageTitle);

        // Tutaj powinieneś dostosować kod do zapisu do własnej bazy danych
        // i używać zabezpieczeń przed atakami typu SQL Injection.
	$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (empty($pageId)){
	$sql = "INSERT INTO `page`(`user_id`, `page_title`, `page_url`, `page_content`) 
		VALUES ($userId,'$pageTitle','$pageUrl','$pageContent')";
	}
	else{
	$sql = "UPDATE `page` 
		SET `page_title`='$pageTitle', `page_url`='$pageUrl', `page_content`='$pageContent' 
		WHERE `page_id`='$pageId'";
	}
	$db->query($sql);
	$db->closeConnection();
    }

    // Przykładowa metoda do pobierania treści strony z bazy danych
    public function getPageContent($pageUrl)
    {
        // Tutaj powinieneś dostosować kod do pobierania z własnej bazy danych.
        if (!empty($pageUrl)) {

	    $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	    $sql = "SELECT * FROM `page` WHERE `page_url` = '$pageUrl'";
	    $result = $db->query($sql);
	    $row = $db->fetchAll($result);
	    $db->closeConnection();
	    if (empty($row)){
		return false;
	    }
	    else{
		     return $row[0];
	    }
        } else {
            return false;
        }
    }

    public function deletePage($pageUrl,$userId)
    {
	    $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	    $sql = "DELETE FROM `page` WHERE `page_url`='$pageUrl' AND `user_id`='$userId'";
	    $result = $db->query($sql);
	    $db->closeConnection();
    }

    public function getPageList()
    {
	    $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	    $sql = "SELECT * FROM `page` ORDER BY page_title";
	    $result = $db->query($sql);
	    $row = $db->fetchAll($result);
	    $db->closeConnection();
	    if (empty($row)){
		return false;
	    }
	    else{
		     return $row;
	    }
    }

 

}

