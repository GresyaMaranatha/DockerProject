<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="signup_process.php" class="form" method="POST">
            <h2>SIGNUP</h2>
            <div class="wrapper">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="box" placeholder="Enter Email" required>  
            </div>
            <div class="wrapper">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="box" placeholder="Enter Password" required>
            </div>
            <div class="wrapper">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="box" placeholder="Enter Password" required>
            </div>

            <span id="error_message" style="color: red;"></span>
            <?php
                // Periksa apakah ada pesan kesalahan dari URL
                if(isset($_GET["error"]) && !empty($_GET["error"])) {
                    $error_message = $_GET["error"];
                    echo '<span style="color: red;">' . htmlspecialchars($error_message) . '</span>';
                }
            ?>
            <input type="submit" id="submit" value="SIGNUP">
            <div class="hubung">
            </div>
        </form>
        <div class="side">
            <img src="./background.png" alt="Cowo Vita">
        </div>
    </div>
    <script>
        // Tambahkan skrip JavaScript untuk menampilkan pesan kesalahan
        const confirmPasswordInput = document.getElementById("confirm_password");
        const errorMessage = document.getElementById("error_message");

        confirmPasswordInput.addEventListener("input", function () {
            const passwordInput = document.getElementById("password").value;
            const confirmPassword = confirmPasswordInput.value;

            if (passwordInput === confirmPassword) {
                errorMessage.textContent = "";
            } else {
                errorMessage.textContent = "Password Tidak Sama";
            }
        });
    </script>
</body>
</html>
