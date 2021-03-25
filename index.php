<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
	

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Absensi Pentas Seni 2021</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-131906273-1');
	</script>
</head>

<body>
<h1><center>Absensi Kegiatan Pentas Seni Tahun 2021</center></h1>
<?php
require 'konek.php';
session_start();
$stts = $_GET['pesan'];
if ($stts == "berhasil"){
	echo "<i>Data berhasil masuk</i>";
}else{
	echo "Silahkan masukan QR";
}
?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
	
		</div> <!--/.container-->
	</div>
	
			
			<div class="col">
				<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

				<div class="col-sm-12"><center>
					<video id="preview" class="p-1 border" style="width:40%; height:40%;align:center"></video>
				</div>
				<script type="text/javascript">
					var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
					scanner.addListener('scan',function(content){
						var npm = content;
						window.location.href = 'http://localhost/qier/index.php?npm='+npm;
					});
					Instascan.Camera.getCameras().then(function (cameras){
						if(cameras.length>0){
							scanner.start(cameras[0]);
							$('[name="options"]').on('change',function(){
								if($(this).val()==1){
									if(cameras[0]!=""){
										scanner.start(cameras[0]);
									}else{
										alert('No Front camera found!');
									}
								}else if($(this).val()==2){
									if(cameras[1]!=""){
										scanner.start(cameras[1]);
									}else{
										alert('No Back camera found!');
									}
								}
							});
						}else{
							console.error('No cameras found.');
							alert('No cameras found.');
						}
					}).catch(function(e){
						console.error(e);
						alert(e);
					});
				</script>

<?php
				require "konek.php";
				$npm = $_GET['npm'];
				$_SESSION['npm'] = $npm;
				if ($result = mysqli_query($koneksi, "SELECT * FROM data where npm = '$npm'")) {
					$data = mysqli_fetch_array($result);
					echo "Nama = ", $data['nama'];
					echo "<br/>";
					echo "Kelas = ", $data['kelas'];
					echo "<br/>";
					echo "NPM = ", $data['npm'];
					echo "<br/>";
 				// Free result set
  				mysqli_free_result($result);
				}
				else{
					echo "Silahkan ulangi";
				}
?>
	<form method="post" action="proses.php">
		<table>
			<tr>
				<td>Suhu</td>
				<td>=</td>
				<td><input type="text" name="suhu" placeholder="Masukkan suhu"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="Masukan"></td>
			</tr>
		</table>			
	</form>

<br/>
<a href="http://localhost/qier/index.php">Kembali</a>
			</div>
			
			
		
		</div>
	</div>
	
</body>
</html>
