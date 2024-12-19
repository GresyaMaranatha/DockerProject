<?php
$servername = "mysql";
$username = "gres";
$password = "gruw123";
$dbname = "db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil";
$conn->close();
?>
