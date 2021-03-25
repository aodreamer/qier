<?php
// menghubungkan dengan koneksi
require 'konek.php';
session_start();
$npm = $_SESSION['npm'];
echo $npm;
echo "<br/>";
 
// menangkap data yang dikirim dari form
$suhu = $_POST['suhu'];
echo $suhu;
$hadir = "hadir";
 
$sql = "UPDATE data SET suhu = '$suhu' WHERE npm = '$npm';";
 
// menghitung jumlah data yang ditemukan
if (mysqli_query($koneksi, $sql)) {
	echo "New record created successfully";
	header("location:http://localhost/qier/index.php?pesan=berhasil");
	
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
