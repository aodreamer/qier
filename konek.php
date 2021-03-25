<?php
$servername = "localhost";
$database = "data";
$username = "root";
$password = "root";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
