<?php
	// include database connection file
	include_once("config.php");
	 
	// Check if form is submitted for user update, then redirect to homepage after update
	if(isset($_POST['update']))
	{	
		$passedNM = $_POST['nimMahasiswa'];
		$passedNO = $_POST['namaMahasiswa'];
		$passedNW = $_POST['namaWilayah'];
		$passedJP = $_POST['jumlahPositif'];
		$passedJD = $_POST['jumlahDirawat'];
		$passedJS = $_POST['jumlahSembuh'];
		$passedJM = $_POST['jumlahMeninggal'];
			
		// update user data
		$result = mysqli_query($mysqli, "UPDATE pasien SET namaOperator = '$passedNO', jumlahPositif = '$passedJP', jumlahDirawat = '$passedJD', jumlahSembuh = '$passedJS', jumlahMeninggal = '$passedJM', namaWilayah = '$passedNW' WHERE nimMahasiswa = $passedNM");
		
		// Redirect to homepage to display updated user in list
		header("Location: index.php");
	}
?>

<?php

	$nimMahasiswa = $_GET['nimMahasiswa'];
	$result = mysqli_query($mysqli, "SELECT * FROM pasien WHERE nimMahasiswa = $nimMahasiswa");	 
	while($user_data = mysqli_fetch_array($result))
	{
		$passedNM1 = $user_data['nimMahasiswa'];
		$passedNM2 = $user_data['namaMahasiswa'];
		$passedJP1 = $user_data['jumlahPositif'];
		$passedJD1 = $user_data['jumlahDirawat'];
		$passedJS1 = $user_data['jumlahSembuh'];
		$passedJM1 = $user_data['jumlahMeninggal'];
		$passedNW4 = $user_data['namaWilayah'];
	}
?>
<html>
<head>	
	<title>Edit Pasien Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="updatePasien" method="post" action="editPasien.php">
		<table border="0">
			<tr> 
				<td>NIM Mahasiswa</td>
				<td>:</td>
				<td><input type="text" name="nimMahasiswa" value=<?php echo $passedNM1; ?> disabled></td>
			</tr>
			<tr> 
				<td>Nama Operator</td>
				<td>:</td>
				<td><input type="text" name="namaMahasiswa" value=<?php echo $passedNM2; ?>></td>
			</tr>
			<tr> 
				<td>Jumlah Positif</td>
				<td>:</td>
				<td><input type="text" name="jumlahPositif" value=<?php echo $passedJP1; ?>></td>
			</tr>
			<tr> 
				<td>Jumlah Dirawat</td>
				<td>:</td>
				<td><input type="text" name="jumlahDirawat" value=<?php echo $passedJD1; ?>></td>
			</tr>
			<tr> 
				<td>Jumlah Sembuh</td>
				<td>:</td>
				<td><input type="text" name="jumlahSembuh" value=<?php echo $passedJS1; ?>></td>
			</tr>
			<tr> 
				<td>Jumlah Meninggal</td>
				<td>:</td>
				<td><input type="text" name="jumlahMeninggal" value=<?php echo $passedJM1; ?>></td>
			</tr>
			<tr> 
				<td>Nama Wilayah</td>
				<td>:</td>
				<td><input type="text" name="namaWilayah" value=<?php echo $passedNW4;?> readonly></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['nimMahasiswa']; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>