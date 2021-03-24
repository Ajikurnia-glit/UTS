<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM pasien ORDER BY nimMahasiswa DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="tambahPasien.php">Add New User</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>NIM Mahasiswa</th>
        <th>Nama Operaotr</th>
        <th>Jumlah Positif</th>
        <th>Jumlah Dirawat</th>
        <th>Jumlah Sembuh</th>
        <th>Jumlah Meninggal</th>
        <th>Nama Wilayah</th>
        <th>Opsi</th>
    </tr>
    <?php  
        while($user_data = mysqli_fetch_array($result)) {         
            if (empty($user_data)) {
                echo "<tr>";
                echo "<td align='center' colspan='8'>No Data</td>";
                echo "</tr>";
            } else {
                echo "<tr>";
                echo "<td align='center'>".$user_data['nimMahasiswa']."</td>";
                echo "<td align='center'>".$user_data['namaMahasiswa']."</td>";
                echo "<td align='center'>".round($user_data['jumlahPositif'])."</td>";    
                echo "<td align='center'>".round($user_data['jumlahDirawat'])."</td>";    
                echo "<td align='center'>".round($user_data['jumlahSembuh'])."</td>";    
                echo "<td align='center'>".round($user_data['jumlahMeninggal'])."</td>";    
                echo "<td align='center'>".$user_data['namaWilayah']."</td>";    
                echo "<td align='center'><a href='editPasien.php?nimMahasiswa=$user_data[nimMahasiswa]'>Edit</a> | <a href='hapusPasien.php?nimMahasiswa=$user_data[nimMahasiswa]'>Delete</a></td></tr>";
            }        
        }
    ?>
    </table>
</body>
</html>