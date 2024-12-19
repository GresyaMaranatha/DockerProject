<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan Anda telah membuat koneksi ke database sebelumnya.
    // Gantilah nilai-nilai berikut sesuai dengan pengaturan database Anda.
    $host = "mysql_server2";
    $username = "gres";
    $password = "gruw123";
    $database = "db";

    // Membuat koneksi ke database
    $conn = new mysqli($host, $username, $password, $database);

    // Periksa apakah koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Tangkap data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Inisialisasi pesan kesalahan
    $error_message = "Password Tidak Sama";

    // Periksa apakah password dan konfirmasi password cocok
    if ($password !== $confirmPassword) {
        $error_message = "Password tidak sama!";
        // Kembali ke halaman signup.php dengan pesan kesalahan
        header("Location: index.php?error=" . urlencode($error_message));
        exit;
    } else {
        // Periksa apakah email sudah ada di database
        $checkEmailQuery = "SELECT email FROM users WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            $error_message = "Email sudah tersedia";
            // Kembali ke halaman signup.php dengan pesan kesalahan
            header("Location: index.php?error=" . urlencode($error_message));
            exit;
        } else {
            // Hash password sebelum menyimpannya ke database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Query SQL untuk menyimpan data ke database
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                // Redirect ke halaman login jika pendaftaran berhasil
                header("Location: ../login/login.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Tutup koneksi database
    $conn->close();
}
?>
