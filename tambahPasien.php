<html>
<head>
	<title>Tambah Pasien</title>
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="tambahPasien.php" method="post">
		<table width="25%">
			<tr> 
				<td>NIM Mahasiswa</td>
				<td>:</td>
				<td><input type="text" name="nimMahasiswa"></td>
			</tr>
			<tr> 
				<td>Nama Operator</td>
				<td>:</td>
				<td><input type="text" name="namaMahasiswa"></td>
			</tr>
			<tr> 
				<td>Nama Wilayah</td>
				<td>:</td>
				<td>
					<select name="namaWilayah">
						<option value="">Select</option>
						<option value="Jakarta">DKI Jakarta</option>
						<option value="Jabar">Jawa Barat</option>
						<option value="Banten">Banten</option>
						<option value="Jateng">Jawa Tengah</option>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Jumlah Positif</td>
				<td>:</td>
				<td><input type="text" name="jumlahPositif"></td>
			</tr>
			<tr> 
				<td>Jumlah Dirawat</td>
				<td>:</td>
				<td><input type="text" name="jumlahDirawat"></td>
			</tr>
			<tr> 
				<td>Jumlah Sembuh</td>
				<td>:</td>
				<td><input type="text" name="jumlahSembuh"></td>
			</tr>
			<tr> 
				<td>Jumlah Meninggal</td>
				<td>:</td>
				<td><input type="text" name="jumlahMeninggal"></td>
			</tr>
			<tr> 
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php

	if(isset($_POST['submit'])) {
		$passedNM = $_POST['nimMahasiswa'];
		$passedNO = $_POST['namaMahasiswa'];
		$passedNW = $_POST['namaWilayah'];
		$passedJP = $_POST['jumlahPositif'];
		$passedJD = $_POST['jumlahDirawat'];
		$passedJS = $_POST['jumlahSembuh'];
		$passedJM = $_POST['jumlahMeninggal'];

		if($passedNW == "") 
		{
			echo "<script>alert('Pilih Wilayah Dulu')</script>";
			header("Refresh:0");
		} else if (!is_numeric($passedNM)){
			echo "<script>alert('Nomor Mahasiswa harus diisi dengan angka')</script>";
			header("Refresh:0");
		}

		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO pasien(nimMahasiswa,namaMahasiswa,jumlahPositif,jumlahDirawat,jumlahSembuh,jumlahMeninggal,namaWilayah) VALUES ('$passedNM','$passedNO','$passedJP','$passedJD','$passedJS','$passedJM','$passedNW')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>