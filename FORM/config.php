<?php 
$host = "localhost:3308";
$user = "root";
$pass = "";
$db = "db_mahasiswa";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Konekasi gagal: ". mysqli_connect_error());
}
?>