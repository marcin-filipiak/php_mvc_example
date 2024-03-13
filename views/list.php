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
    <a href="index.php?action=editor">Dodaj stronę</a>
    <a href="index.php?action=list">Lista</a>
    <a href="index.php?action=logout">Wyloguj</a>
</div>

    <div class="page-container">
	<h1>Index</h1>
	<table>
	<tr><th>Page Title</th><th>Action</th></tr>	
	<?php      
	foreach ($pageList as $page) {
	    echo '<tr>';
	    echo '<td>' . $page['page_title'] . '</td>';
	    echo '<td>
			<a href="index.php?action=display&page=' . $page['page_url'] . '">show</a>
			<a href="index.php?action=editor&page=' . $page['page_url'] . '">edit</a>
			<a href="index.php?action=delete&page=' . $page['page_url'] . '">delete</a>
		  </td>';
	    echo '</tr>';
	}
	?>
	</table>
    </div>

</body>
</html>

