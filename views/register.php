<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Rejestruj</title>
    <style>
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Rejestruj</h2>
        <form action="index.php?action=register" method="post">
            <div class="form-group">
                <label for="username">Login:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Ponownie Hasło:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
	    <p id="error-message" style="color:red;"></p>
	    <div class="form-group">
                <label for="username">Email:</label>
                <input type="email" id="emial" name="email" required>
            </div>
            <button type="submit" class="login-button">Rejestruj</button>

        </form>
        <?php if (isset($errorMessage)) : ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>


<script>
        document.addEventListener("DOMContentLoaded", function() {
            var password = document.getElementById("password");
            var confirmPassword = document.getElementById("confirm-password");
            var errorDiv = document.getElementById("error-message");

            function checkPasswordMatch() {
                var passwordValue = password.value;
                var confirmPasswordValue = confirmPassword.value;

                if (passwordValue !== confirmPasswordValue) {
                    errorDiv.textContent = "Hasła nie są identyczne.";
                } else {
                    errorDiv.textContent = "";
                }
            }

            confirmPassword.addEventListener("input", checkPasswordMatch);
	    password.addEventListener("input", checkPasswordMatch);
        });
</script>

</body>
</html>

