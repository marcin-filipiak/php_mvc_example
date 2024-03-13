<?php

class LogoutController
{
    public function handleRequest()
    {
            session_destroy();
	    header('Location: index.php');
            exit;
    }
            
}

