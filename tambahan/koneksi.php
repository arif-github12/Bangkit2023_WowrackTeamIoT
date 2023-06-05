<?php

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'bangkit01';

	$conn = mysqli_connect($host, $user, $pass, $db);
	if($conn){
		echo"koneksi Berhasil";
	}

	mysqli_select_db($conn, $db);
	
?>

<?php
$servername = "163.53.195.134";
$username = "bangkit01";
$password = "5HkCam60wLv02mH";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>