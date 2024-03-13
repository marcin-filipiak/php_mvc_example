<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Logowanie</title>
</head>
<body>

    <div class="login-container">
        <h2>Logowanie</h2>
        <form action="index.php?action=login" method="post">
            <div class="form-group">
                <label for="username">Login:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Zaloguj</button>
    	    <a href="index.php?action=register">Rejestruj</a>
        </form>
        <?php if (isset($errorMessage)) : ?>
            <p id="error-message" class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>

</body>
</html>

