<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Wyświetlanie Strony</title>
</head>
<body>

<div id="menu">
    <a href="index.php?action=display&page=home">Start</a>
    <a href="index.php?action=editor&page=<?php echo $pageBody["page_url"]; ?>">Edytuj</a>
    <a href="index.php?action=editor">Dodaj stronę</a>
    <a href="index.php?action=list">Lista</a>
    <a href="index.php?action=logout">Wyloguj</a>
</div>

    <div class="page-container">
	<h1><?php echo $pageBody["page_title"]; ?></h1>
        <?php echo $pageBody["page_content"]; ?>
    </div>

</body>
</html>

