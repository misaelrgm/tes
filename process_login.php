<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ganti informasi database sesuai dengan pengaturan Anda.
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "db_login1";

    // Membuat koneksi ke database
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Periksa apakah koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mendapatkan data dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lindungi dari SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk mencocokkan username dan password
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    // Periksa apakah data login valid
    if ($result->num_rows == 1) {
        // Data login benar
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Ganti dengan halaman setelah login
    } else {
        // Data login salah
        echo "Username atau password salah. Silakan coba lagi.";
    }

    // Tutup koneksi database
    $conn->close();
}
?>
