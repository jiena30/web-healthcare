<?php
// Konfigurasi Database
$host = "localhost";
$port = "3308"; // Port MySQL XAMPP kamu
$db_name = "db_healthcare";
$username = "root";
$password = "indahvira05"; // Bawaan XAMPP biasanya kosong

try {

    // Membuat koneksi database dengan PDO
    $koneksi = new PDO(
        "mysql:host=$host;port=$port;dbname=$db_name;charset=utf8mb4",
        $username,
        $password
    );

    // Mengatur mode error PDO ke Exception
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Test koneksi (hapus komentar jika ingin tes)
    // echo "Koneksi Database Berhasil!";

} catch(PDOException $exception) {

    die("Koneksi ke database gagal: " . $exception->getMessage());

}
?>