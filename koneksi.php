<?php
$host = "localhost";
$user = "root";
$pass = "";
$DB = "aplikasi_rt";
$koneksi = new mysqli("$host","$user","$pass","$DB");
if($koneksi -> connect_error){
    echo "<script>alert('Koneksi Gagal Ke Database');</script>".$koneksi->connect_error;
}
?>