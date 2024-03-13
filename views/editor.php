<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Edytor Treści</title>
    <style>
    </style>
</head>
<body>

<div id="menu">
    <a href="index.php?action=display&page=home">Start</a>
    <a href="index.php?action=editor">Dodaj stronę</a>
    <a href="index.php?action=list">Lista</a>
    <a href="index.php?action=logout">Wyloguj</a>
</div>

<div class="editor-container">
    <h2>Edytor Treści</h2>
    <form action="index.php?action=editor" method="post">
    <input type="hidden" name="pageId" value="<?php echo $pageBody["page_id"];?>">
        <div class="form-group">
            <label for="pageTitle">Nazwa Strony:</label>
            <input type="text" id="pageTitle" name="pageTitle" required value="<?php echo $pageBody["page_title"];?>">
        </div>
        <div class="form-group">
            <label for="pageContent">Treść:</label>
            <textarea id="pageContent" name="pageContent" rows="8" required><?php echo $pageBody["page_content"];?></textarea>
        </div>
        <button type="submit" class="save-button">Zapisz</button>
    </form>
</div>

</body>
</html>

