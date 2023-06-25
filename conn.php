<?php

$server = "localhost";
$user = "root";
$password = "";
$dbName = "ajax_login";

$conn  = mysqli_connect($server,$user,$password,$dbName);

// if ($conn) {
//     echo "koneksi berhasil";
// }else {
//     echo "error " . mysqli_connect_error($conn);
// }