<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="login_process.php" class="form" method="POST">
            <h2>LOGIN</h2>

            <div class="wrapper">
                <label for="email">Email</label>
                <input type="email" name="email" class="box" placeholder="Enter Email">
            </div>
            <div class="wrapper">
                <label for="password">Password</label>
                <input type="password" name="password" class="box" placeholder="Enter Password">
            </div>

    <div class="error">
            <?php
            // Tampilkan pesan kesalahan jika ada
            if (isset($_GET['error'])) {
                $error_message = $_GET['error'];
                echo '<p style="color: red;">' . $error_message . '</p>';
            }
            ?>
    </div>
            <input type="submit" id="submit" value="LOGIN">
            <p>Belum punya akun? <a href="../signup/signup.php">Daftar Sekarang!</a></p>
        </form>
        <div class="side">
            <img src="../20230313_223238.jpg" alt="Cowo Vita">
        </div>
    </div>
</body>
</html>
<!-- menyediakan antarmuka kepada user untuk melakukan login  -->